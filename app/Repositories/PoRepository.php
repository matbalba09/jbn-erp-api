<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\PoRequest;
use Carbon\Carbon;
use App\Models\Po;
use App\Models\PoDetail;
use App\Models\PoPayment;
use App\Models\PrintMaterial;
use App\Models\RawMaterial;
use App\Models\RawMaterialV2;
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
        $po = Po::with('payment_details', 'po_details.inventory', 'order', 'po_details.raw_materials', 'po_details.print_materials')->where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $po;
    }

    function getById($id)
    {
        $po = Po::with('payment_details', 'po_details.inventory', 'order', 'po_details.raw_materials', 'po_details.print_materials')->findOrFail($id);
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

            $data['supplier_name'] = isset($data['supplier_name']) ? $data['supplier_name'] : null;
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

            $poDetailData = $data['po_details'] ?? null;
            if ($poDetailData) {
                $poDetail = PoDetail::create([
                    'po_no' => $po->po_no,
                    'inventory_id' => $poDetailData['inventory_id'] ?? null,
                    'remarks' => $poDetailData['remarks'] ?? null,
                    'name' => $poDetailData['name'] ?? null,
                    'uom' => $poDetailData['uom'] ?? null,
                    'quantity' => $poDetailData['quantity'] ?? null,
                    'unit_price' => $poDetailData['unit_price'] ?? null,
                    'total_price' => $poDetailData['total_price'] ?? null,
                    'is_deleted' => Response::FALSE,
                ]);

                if (isset($poDetailData['raw_materials']) && is_array($poDetailData['raw_materials'])) {
                    foreach ($poDetailData['raw_materials'] as $rawMaterialDetail) {
                        $rawMaterial = RawMaterialV2::create([
                            'maker' => $rawMaterialDetail['maker'] ?? null,
                            'material' => $rawMaterialDetail['material'] ?? null,
                            'color' => $rawMaterialDetail['color'] ?? null,
                            'size' => $rawMaterialDetail['size'] ?? null,
                            'uom' => $rawMaterialDetail['uom'] ?? null,
                            'quantity' => $rawMaterialDetail['quantity'] ?? null,
                            'unit_price' => $rawMaterialDetail['unit_price'] ?? null,
                            'total_price' => $rawMaterialDetail['total_price'] ?? null,
                            'remarks' => $rawMaterialDetail['remarks'] ?? null,
                            'is_deleted' => Response::FALSE,
                        ]);
                        $poDetail->raw_materials()->attach($rawMaterial->id);
                    }
                }

                if (isset($poDetailData['print_materials']) && is_array($poDetailData['print_materials'])) {
                    foreach ($poDetailData['print_materials'] as $printMaterialDetail) {
                        $printMaterial = PrintMaterial::create([
                            'print' => $printMaterialDetail['print'] ?? null,
                            'color' => $printMaterialDetail['color'] ?? null,
                            'size' => $printMaterialDetail['size'] ?? null,
                            'uom' => $printMaterialDetail['uom'] ?? null,
                            'quantity' => $printMaterialDetail['quantity'] ?? null,
                            'unit_price' => $printMaterialDetail['unit_price'] ?? null,
                            'total_price' => $printMaterialDetail['total_price'] ?? null,
                            'remarks' => $printMaterialDetail['remarks'] ?? null,
                            'is_deleted' => Response::FALSE,
                        ]);
                        $poDetail->print_materials()->attach($printMaterial->id);
                    }
                }
            }

            $payments = $data['payment_details'] ?? null;
            if ($payments) {
                foreach ($payments as $detail) {
                    PoPayment::create([
                        'po_no' => $po->po_no,
                        'issued_date' => $detail['issued_date'] ?? null,
                        'ref_no' => $detail['ref_no'] ?? null,
                        'paid_date' => $detail['paid_date'] ?? null,
                        'payment_method' => $detail['payment_method'] ?? null,
                        'amount' => $detail['amount'] ?? null,
                        'description' => $detail['description'] ?? null,
                        'documents' => $detail['documents'] ?? null,
                        'status' => $detail['status'] ?? null,
                        'check_no' => $detail['check_no'] ?? null,
                        'bank_name' => $detail['bank_name'] ?? null,
                        'verified' => $detail['verified'] ?? null,
                        'is_deleted' => Response::FALSE,
                    ]);
                }
            }
            $result[] = $po->load(['payment_details', 'po_details.raw_materials', 'po_details.print_materials']);
        }
        return $result;
    }

    function update(PoRequest $request, $id)
    {
        $po = Po::findOrFail($id);
        $validatedData = $request->validated();
        $po->update($validatedData);

        $poDetail = PoDetail::where('po_no', $po->po_no)->first();
        $poDetails = $request->input('po_details');
        $poDetail->update([
            'po_no' => $poDetails['po_no'] ?? $poDetail->po_no,
            'inventory_id' => $poDetails['inventory_id'] ?? $poDetail->inventory_id,
            'remarks' => $poDetails['remarks'] ?? $poDetail->remarks,
            'name' => $poDetails['name'] ?? $poDetail->name,
            'uom' => $poDetails['uom'] ?? $poDetail->uom,
            'quantity' => $poDetails['quantity'] ?? $poDetail->quantity,
            'unit_price' => $poDetails['unit_price'] ?? $poDetail->unit_price,
            'total_price' => $poDetails['total_price'] ?? $poDetail->total_price,
            'is_deleted' => Response::FALSE,
        ]);

        if (isset($poDetails['raw_materials']) && is_array($poDetails['raw_materials'])) {
            $rawMaterialIds = [];

            foreach ($poDetails['raw_materials'] as $rawMaterialDetail) {
                $rawMaterial = RawMaterialV2::create([
                    'maker' => $rawMaterialDetail['maker'] ?? null,
                    'material' => $rawMaterialDetail['material'] ?? null,
                    'color' => $rawMaterialDetail['color'] ?? null,
                    'size' => $rawMaterialDetail['size'] ?? null,
                    'uom' => $rawMaterialDetail['uom'] ?? null,
                    'quantity' => $rawMaterialDetail['quantity'] ?? null,
                    'unit_price' => $rawMaterialDetail['unit_price'] ?? null,
                    'total_price' => $rawMaterialDetail['total_price'] ?? null,
                    'remarks' => $rawMaterialDetail['remarks'] ?? null,
                    'is_deleted' => Response::FALSE,
                ]);
                $rawMaterialIds[] = $rawMaterial->id;
            }
            $poDetail->raw_materials()->sync($rawMaterialIds);
        }

        if (isset($poDetails['print_materials']) && is_array($poDetails['print_materials'])) {
            $printMaterialIds = [];

            foreach ($poDetails['print_materials'] as $printMaterialDetail) {
                $printMaterial = PrintMaterial::create([
                    'print' => $printMaterialDetail['print'] ?? null,
                    'color' => $printMaterialDetail['color'] ?? null,
                    'size' => $printMaterialDetail['size'] ?? null,
                    'uom' => $printMaterialDetail['uom'] ?? null,
                    'quantity' => $printMaterialDetail['quantity'] ?? null,
                    'unit_price' => $printMaterialDetail['unit_price'] ?? null,
                    'total_price' => $printMaterialDetail['total_price'] ?? null,
                    'remarks' => $printMaterialDetail['remarks'] ?? null,
                    'is_deleted' => Response::FALSE,
                ]);
                $printMaterialIds[] = $printMaterial->id;
            }
            $poDetail->print_materials()->sync($printMaterialIds);
        }

        return $po->load(['po_details.raw_materials', 'po_details.print_materials']);
    }

    function delete($id)
    {
        $po = Po::findOrFail($id);
        $po->delete();

        return $po;
    }
}
