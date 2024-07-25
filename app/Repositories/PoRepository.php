<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\PoRequest;
use Carbon\Carbon;
use App\Models\Po;
use App\Models\PoDetail;
use App\Response;

interface IPoRepository
{
    function getAll();
    function getById($id);
    function create(PoRequest $request);
    function update(PoRequest $request, $id);
    function delete($id);
}

class PoRepository implements IPoRepository
{
    function getAll()
    {
        $po = Po::with('po_details.inventory', 'supplier', 'order')->where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $po;
    }

    function getById($id)
    {
        $po = Po::with('po_details.inventory', 'supplier', 'order')->findOrFail($id);
        return $po;
    }

    function create(PoRequest $request)
    {
        $dateNow = Carbon::now()->format('ymd');
        $result = [];
        $pos = $request->input('pos');

        foreach ($pos as $data) {
            $latestPo = Po::orderBy('id', 'desc')->first();
            if (!$latestPo) {
                $initialBase36 = Helper::decimalToBase36(1);
                $data['po_no'] = 'POR' . $dateNow . '-PR-' . $initialBase36;
            } else {
                $dateOfLatest = Helper::getFullDateFromNo($latestPo->po_no);
                if ($dateOfLatest != $dateNow) {
                    $initialBase36 = Helper::decimalToBase36(1);
                    $data['po_no'] = 'POR' . $dateNow . '-PR-' . $initialBase36;
                } else {
                    $base36 = Helper::getLastPart($latestPo->po_no);
                    $decimal = Helper::base36ToDecimal($base36) + 1;
                    $backToBase36 = Helper::decimalToBase36($decimal);
                    $data['po_no'] = 'POR' . $dateNow . '-PR-' . $backToBase36;
                }
            }

            $data['supplier_id'] = isset($data['supplier_id']) ? $data['supplier_id'] : null;
            $data['po_date'] = isset($data['po_date']) ? $data['po_date'] : null;
            $data['status'] = isset($data['status']) ? $data['status'] : null;
            $data['remarks'] = isset($data['remarks']) ? $data['remarks'] : null;
            $data['ship_to'] = isset($data['ship_to']) ? $data['ship_to'] : null;
            $data['delivery_date'] = isset($data['delivery_date']) ? $data['delivery_date'] : null;
            $data['requested_by'] = isset($data['requested_by']) ? $data['requested_by'] : null;
            $data['approved_by'] = isset($data['approved_by']) ? $data['approved_by'] : null;
            $data['received_by'] = isset($data['received_by']) ? $data['received_by'] : null;
            $data['is_deleted'] = Response::FALSE;

            $po = Po::create($data);

            $poDetails = isset($data['po_details']) ? $data['po_details'] : [];
            if ($poDetails) {
                foreach ($poDetails as $detail) {
                    PoDetail::create([
                        'po_no' => $po->po_no,
                        'inventory_id' => isset($detail['inventory_id']) ? $detail['inventory_id'] : null,
                        'remarks' => isset($detail['remarks']) ? $detail['remarks'] : null,
                        'name' => isset($detail['name']) ? $detail['name'] : null,
                        'uom' => isset($detail['uom']) ? $detail['uom'] : null,
                        'quantity' => isset($detail['quantity']) ? $detail['quantity'] : null,
                        'unit_price' => isset($detail['unit_price']) ? $detail['unit_price'] : null,
                        'total_price' => isset($detail['total_price']) ? $detail['total_price'] : null,
                        'is_deleted' => Response::FALSE,
                    ]);
                }
            }

            $result[] = $po->load(['po_details']);
        }
        return $result;
    }

    function update(PoRequest $request, $id)
    {
        $po = Po::findOrFail($id);
        $validatedData = $request->validated();
        $po->update($validatedData);

        $allPoDetails = PoDetail::where('po_no', $po->po_no)->get();

        foreach ($allPoDetails as $poDetail) {
            $poDetail->delete();
        }

        $poDetails = $request->input('po_details');
        if ($poDetails) {
            foreach ($poDetails as $detail) {
                PoDetail::create([
                    'po_no' => $po->po_no,
                    'inventory_id' => isset($detail['inventory_id']) ? $detail['inventory_id'] : null,
                    'remarks' => isset($detail['remarks']) ? $detail['remarks'] : null,
                    'name' => isset($detail['name']) ? $detail['name'] : null,
                    'uom' => isset($detail['uom']) ? $detail['uom'] : null,
                    'quantity' => isset($detail['quantity']) ? $detail['quantity'] : null,
                    'unit_price' => isset($detail['unit_price']) ? $detail['unit_price'] : null,
                    'total_price' => isset($detail['total_price']) ? $detail['total_price'] : null,
                    'is_deleted' => Response::FALSE,
                ]);
            }
        }
        return $po->load(['po_details']);;
    }

    function delete($id)
    {
        $po = Po::findOrFail($id);
        $po->delete();

        return $po;
    }
}
