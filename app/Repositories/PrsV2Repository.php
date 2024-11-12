<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\PrsV2Request;
use App\Http\Requests\CreatePrsV2Request;
use App\Http\Requests\UpdatePrsV2Request;
use App\Models\ItemRequisition;
use Carbon\Carbon;
use App\Models\PrsV2;
use App\Models\SupplierV2;
use App\Response;

interface IPrsV2Repository
{
    function getAll();
    function getById($id);
    function create(PrsV2Request $request);
    function update(PrsV2Request $request, $id);
    function delete($id);
}

class PrsV2Repository implements IPrsV2Repository
{
    function getAll()
    {
        $prsV2 = PrsV2::with('customer', 'item_requisitions.supplier_v2')
            ->where('is_deleted', Response::FALSE)
            ->orderBy('created_at', 'desc')->get();
        return $prsV2;
    }

    function getById($id)
    {
        $prsV2 = PrsV2::with('customer', 'item_requisitions.supplier_v2')->findOrFail($id);
        return $prsV2;
    }

    function create(PrsV2Request $request)
    {
        $latestPrs = PrsV2::latest()->first();
        $dateNow = Carbon::now()->format('ymd');

        $validatedData = $request->validated();

        if (!$latestPrs) {
            $initialBase36 = Helper::decimalToBase36(1);
            $validatedData['prs_no'] = 'PRS' . $dateNow . '-SR-' . $initialBase36;
        } else {
            $dateOfLatest = Helper::getFullDateFromNo($latestPrs->prs_no);
            if ($dateOfLatest != $dateNow) {
                $initialBase36 = Helper::decimalToBase36(1);
                $validatedData['prs_no'] = 'PRS' . $dateNow . '-SR-' . $initialBase36;
            } else {
                $base36 = Helper::getLastPart($latestPrs->prs_no);
                $decimal = Helper::base36ToDecimal($base36) + 1;
                $backToBase36 = Helper::decimalToBase36($decimal);
                $validatedData['prs_no'] = 'PRS' . $dateNow . '-SR-' . $backToBase36;
            }
        }
        $validatedData['is_deleted'] = Response::FALSE;

        $prsV2 = PrsV2::create($validatedData);

        $itemRequisitions = $request->input('item_requisitions');
        if ($itemRequisitions) {
            foreach ($itemRequisitions as $detail) {
                $itemRequisition = ItemRequisition::create([
                    'prs_id' => $prsV2->id,
                    'item_name' => isset($detail['item_name']) ? $detail['item_name'] : null,
                    'maker' => isset($detail['maker']) ? $detail['maker'] : null,
                    'material' => isset($detail['material']) ? $detail['material'] : null,
                    'color' => isset($detail['color']) ? $detail['color'] : null,
                    'size' => isset($detail['size']) ? $detail['size'] : null,
                    'print' => isset($detail['print']) ? $detail['print'] : null,
                    'print_size' => isset($detail['print_size']) ? $detail['print_size'] : null,
                    'design_url' => isset($detail['design_url']) ? $detail['design_url'] : null,
                    'remarks' => isset($detail['remarks']) ? $detail['remarks'] : null,
                    'quantity' => isset($detail['quantity']) ? $detail['quantity'] : null,
                    'selling_price' => isset($detail['selling_price']) ? $detail['selling_price'] : null,
                    'supplier_id' => isset($detail['supplier_id']) ? $detail['supplier_id'] : null,
                    'is_deleted' => Response::FALSE,
                ]);

                if (isset($detail['supplier'])) {
                    foreach ($detail['supplier'] as $supplier) {
                        $supplierV2 = SupplierV2::create([
                            'supplier_name' => isset($supplier['supplier_name']) ? $supplier['supplier_name'] : null,
                            'uom' => isset($supplier['uom']) ? $supplier['uom'] : null,
                            'quantity' => isset($supplier['quantity']) ? $supplier['quantity'] : null,
                            'price' => isset($supplier['price']) ? $supplier['price'] : null,
                            'operation' => isset($supplier['operation']) ? $supplier['operation'] : null,
                            'remarks' => isset($supplier['remarks']) ? $supplier['remarks'] : null,
                            'is_deleted' => Response::FALSE,
                        ]);
                    }
                    $itemRequisition->update(['supplier_id' => $supplierV2->id]);
                }
            }
        }
        return $prsV2->load(['customer', 'item_requisitions.supplier_v2']);
    }

    function update(PrsV2Request $request, $id)
    {
        $prsV2 = PrsV2::findOrFail($id);
        $validatedData = $request->validated();
        $prsV2->update($validatedData);

        return $prsV2;
    }

    function delete($id)
    {
        $prsV2 = PrsV2::findOrFail($id);
        $prsV2->delete();

        return $prsV2;
    }
}
