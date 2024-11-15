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
        $prsV2 = PrsV2::with('customer', 'item_requisitions.suppliers')
            ->where('is_deleted', Response::FALSE)
            ->orderBy('created_at', 'desc')->get();
        return $prsV2;
    }

    function getById($id)
    {
        $prsV2 = PrsV2::with('customer', 'item_requisitions.suppliers')->findOrFail($id);
        return $prsV2;
    }

    function create(PrsV2Request $request)
    {
        $latestPrsV2 = PrsV2::latest()->first();
        $dateNow = Carbon::now()->format('ymd');

        $validatedData = $request->validated();

        if (!$latestPrsV2) {
            $initialBase36 = Helper::decimalToBase36(1);
            $validatedData['prs_no'] = 'PRS' . $dateNow . '-SR-' . $initialBase36;
        } else {
            $dateOfLatest = Helper::getFullDateFromNo($latestPrsV2->prs_no);
            if ($dateOfLatest != $dateNow) {
                $initialBase36 = Helper::decimalToBase36(1);
                $validatedData['prs_no'] = 'PRS' . $dateNow . '-SR-' . $initialBase36;
            } else {
                $base36 = Helper::getLastPart($latestPrsV2->prs_no);
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
                    'item_name' => $detail['item_name'] ?? null,
                    'maker' => $detail['maker'] ?? null,
                    'material' => $detail['material'] ?? null,
                    'color' => $detail['color'] ?? null,
                    'size' => $detail['size'] ?? null,
                    'print' => $detail['print'] ?? null,
                    'print_size' => $detail['print_size'] ?? null,
                    'design_url' => $detail['design_url'] ?? null,
                    'remarks' => $detail['remarks'] ?? null,
                    'quantity' => $detail['quantity'] ?? null,
                    'selling_price' => $detail['selling_price'] ?? null,
                    'is_deleted' => Response::FALSE,
                ]);

                // Check if suppliers are provided for this item requisition
                if (isset($detail['supplier']) && is_array($detail['supplier'])) {
                    $supplierData = [];

                    foreach ($detail['supplier'] as $supplier) {
                        // Create each supplier if it doesn’t already exist
                        $supplierV2 = SupplierV2::create([
                            'supplier_name' => $supplier['supplier_name'] ?? null,
                            'uom' => $supplier['uom'] ?? null,
                            'quantity' => $supplier['quantity'] ?? null,
                            'price' => $supplier['price'] ?? null,
                            'operation' => $supplier['operation'] ?? null,
                            'remarks' => $supplier['remarks'] ?? null,
                            'is_deleted' => Response::FALSE,
                        ]);
                        $itemRequisition->suppliers()->attach($supplierV2->id);
                    }
                }
            }
        }

        return $prsV2->load(['customer', 'item_requisitions.suppliers']);
    }

    public function update(PrsV2Request $request, $id)
    {
        $prsV2 = PrsV2::findOrFail($id);
        $validatedData = $request->validated();
        $prsV2->update($validatedData);

        $itemRequisitions = $request->input('item_requisitions');
        if ($itemRequisitions) {
            foreach ($itemRequisitions as $detail) {

                $itemRequisition = ItemRequisition::where('prs_id', $prsV2->id)
                    ->first();
                // Update existing ItemRequisition
                $itemRequisition->update([
                    'item_name' => $detail['item_name'] ?? $itemRequisition->item_name,
                    'maker' => $detail['maker'] ?? $itemRequisition->maker,
                    'material' => $detail['material'] ?? $itemRequisition->material,
                    'color' => $detail['color'] ?? $itemRequisition->color,
                    'size' => $detail['size'] ?? $itemRequisition->size,
                    'print' => $detail['print'] ?? $itemRequisition->print,
                    'print_size' => $detail['print_size'] ?? $itemRequisition->print_size,
                    'design_url' => $detail['design_url'] ?? $itemRequisition->design_url,
                    'remarks' => $detail['remarks'] ?? $itemRequisition->remarks,
                    'quantity' => $detail['quantity'] ?? $itemRequisition->quantity,
                    'selling_price' => $detail['selling_price'] ?? $itemRequisition->selling_price,
                    'is_deleted' => Response::FALSE,
                ]);

                // Update or create associated suppliers
                if (isset($detail['suppliers']) && is_array($detail['suppliers'])) {
                    $supplierIds = []; // Track supplier IDs for sync

                    foreach ($detail['suppliers'] as $supplierDetail) {
                        if (isset($supplierDetail['id'])) {
                            // Update existing SupplierV2
                            $supplierV2 = SupplierV2::findOrFail($supplierDetail['id']);
                            $supplierV2->update([
                                'supplier_name' => $supplierDetail['supplier_name'] ?? $supplierV2->supplier_name,
                                'uom' => $supplierDetail['uom'] ?? $supplierV2->uom,
                                'quantity' => $supplierDetail['quantity'] ?? $supplierV2->quantity,
                                'price' => $supplierDetail['price'] ?? $supplierV2->price,
                                'operation' => $supplierDetail['operation'] ?? $supplierV2->operation,
                                'remarks' => $supplierDetail['remarks'] ?? $supplierV2->remarks,
                                'is_deleted' => Response::FALSE,
                            ]);
                        } else {
                            // Create new SupplierV2 if ID not provided
                            $supplierV2 = SupplierV2::create([
                                'supplier_name' => $supplierDetail['supplier_name'] ?? null,
                                'uom' => $supplierDetail['uom'] ?? null,
                                'quantity' => $supplierDetail['quantity'] ?? null,
                                'price' => $supplierDetail['price'] ?? null,
                                'operation' => $supplierDetail['operation'] ?? null,
                                'remarks' => $supplierDetail['remarks'] ?? null,
                                'is_deleted' => Response::FALSE,
                            ]);
                        }
                        // Add the supplier ID to the list for syncing
                        $supplierIds[] = $supplierV2->id;
                    }
                    // Sync the item requisition's suppliers
                    $itemRequisition->suppliers()->sync($supplierIds);
                }
            }
        }
        return $prsV2->load(['customer', 'item_requisitions.suppliers']);
    }

    function delete($id)
    {
        $prsV2 = PrsV2::findOrFail($id);
        $prsV2->delete();

        return $prsV2;
    }
}
