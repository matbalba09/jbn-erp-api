<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreatePrsSupplierRequest;
use App\Http\Requests\CreatePrsDetailRequest;
use App\Http\Requests\CreatePrsRequest;
use App\Http\Requests\PrsRequest;
use App\Http\Requests\UpdatePrsRequest;
use App\Models\PrsSupplier;
use App\Models\PrsSupplierItem;
use Carbon\Carbon;
use App\Models\Prs;
use App\Models\PrsDetail;
use App\Response;
use Illuminate\Http\Request;

interface IPrsRepository
{
    function getAll();
    function getById($id);
    function create(PrsRequest $request);
    function update(Request $request, $id);
    function delete($id);
}

class PrsRepository implements IPrsRepository
{
    function getAll()
    {
        $prs = Prs::with(
            'customer',
            'prs_details.prs_suppliers.supplier',
            'prs_details.prs_suppliers.prs_supplier_items.bom.inventory',
            'prs_details.product'
        )
            ->where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $prs;
    }

    function getById($id)
    {
        $prs = Prs::with(
            'customer',
            'prs_details.prs_suppliers.supplier',
            'prs_details.prs_suppliers.prs_supplier_items.bom.inventory',
            'prs_details.product'
        )
            ->where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')
            ->findOrFail($id);
        return $prs;
    }

    function create(PrsRequest $request)
    {
        $latestPrs = Prs::latest()->first();
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

        $prs = Prs::create($validatedData);

        $prsDetails = $request->input('prs_details');
        if ($prsDetails) {
            foreach ($prsDetails as $detail) {
                $prsDetail = PrsDetail::create([
                    'prs_id' => $prs->id,
                    'product_id' => isset($detail['product_id']) ? $detail['product_id'] : null,
                    'name' => isset($detail['name']) ? $detail['name'] : null,
                    'uom' => isset($detail['uom']) ? $detail['uom'] : null,
                    'quantity' => isset($detail['quantity']) ? $detail['quantity'] : null,
                    'unit_price' => isset($detail['unit_price']) ? $detail['unit_price'] : null,
                    'total_price' => isset($detail['total_price']) ? $detail['total_price'] : null,
                    'remarks' => isset($detail['remarks']) ? $detail['remarks'] : null,
                    'is_deleted' => Response::FALSE,
                ]);
                // if (isset($detail['prs_suppliers'])) {
                //     foreach ($detail['prs_suppliers'] as $supplier) {
                //         $prsSupplier = PrsSupplier::create([
                //             'prs_detail_id' => $prsDetail->id,
                //             'supplier_id' => isset($supplier['supplier_id']) ? $supplier['supplier_id'] : null,
                //             'name' => isset($supplier['name']) ? $supplier['name'] : null,
                //             'uom' => $prsDetail->uom,
                //             'quantity' => $prsDetail->quantity,
                //             'unit_price' => isset($supplier['unit_price']) ? $supplier['unit_price'] : null,
                //             'is_deleted' => Response::FALSE,
                //         ]);
                //     }

                //     if (isset($supplier['prs_supplier_items'])) {
                //         foreach ($supplier['prs_supplier_items'] as $item) {
                //             PrsSupplierItem::create([
                //                 'prs_supplier_id' => $prsSupplier->id,
                //                 'bom_id' => isset($item['bom_id']) ? $item['bom_id'] : null,
                //                 'item_name' => isset($item['item_name']) ? $item['item_name'] : null,
                //                 'inventory_id' => isset($item['inventory_id']) ? $item['inventory_id'] : null,
                //                 'uom' => $prsSupplier->uom,
                //                 'quantity' => $prsSupplier->quantity,
                //                 'unit_price' => $prsSupplier->unit_price,
                //                 'is_deleted' => Response::FALSE,
                //             ]);
                //         }
                //     }
                // }
            }
        }
        return $prs->load(['customer', 'prs_details']);
    }

    // function update(PrsRequest $request, $id)
    // {
    //     $prs = Prs::findOrFail($id);
    //     $validatedData = $request->validated();
    //     $prs->update($validatedData);

    //     return $prs->load(['customer', 'prs_details']);
    // }

    function update(Request $request, $id)
    {
        $prs = Prs::findOrFail($id);
        $prs->status = $request->input('status');
        $prs->save();

        $prsDetails = $request->input('prs_details');
        if ($prsDetails) {
            foreach ($prsDetails as $detail) {
                $prsDetailData = PrsDetail::where('prs_id', $prs->id)
                    ->first();

                $prsDetailData->fill([
                    'product_id' => isset($detail['product_id']) ? $detail['product_id'] : null,
                    'name' => isset($detail['name']) ? $detail['name'] : null,
                    'uom' => isset($detail['uom']) ? $detail['uom'] : null,
                    'quantity' => isset($detail['quantity']) ? $detail['quantity'] : null,
                    'unit_price' => isset($detail['unit_price']) ? $detail['unit_price'] : null,
                    'total_price' => isset($detail['total_price']) ? $detail['total_price'] : null,
                    'remarks' => isset($detail['remarks']) ? $detail['remarks'] : null,
                    'is_deleted' => Response::FALSE,
                ]);
                $prsDetailData->save();

                $allPrsSupplier = PrsSupplier::where('prs_detail_id', $prsDetailData->id)->get();

                foreach ($allPrsSupplier as $prsSupplier) {
                    $prsSupplier->delete();
                }

                if (isset($detail['prs_suppliers']) && !empty($detail['prs_suppliers'])) {
                    foreach ($detail['prs_suppliers'] as $supplier) {
                        if (!empty($supplier)) {
                            $prsSupplierData = new PrsSupplier();
                            $prsSupplierData->fill([
                                'prs_detail_id' => $prsDetailData->id,
                                'supplier_id' => isset($supplier['supplier_id']) ? $supplier['supplier_id'] : null,
                                'name' => isset($supplier['name']) ? $supplier['name'] : null,
                                'uom' => isset($supplier['uom']) ? $supplier['uom'] : null,
                                'quantity' => isset($supplier['quantity']) ? $supplier['quantity'] : null,
                                'unit_price' => isset($supplier['unit_price']) ? $supplier['unit_price'] : null,
                                'is_deleted' => Response::FALSE,
                            ]);
                            $prsSupplierData->save();

                            if (isset($supplier['prs_supplier_items']) && !empty($supplier['prs_supplier_items'])) {
                                foreach ($supplier['prs_supplier_items'] as $item) {
                                    if (!empty($item)) {
                                        $prsSupplierItemData = PrsSupplierItem::where('prs_supplier_id', $prsSupplierData->id)
                                            ->where('bom_id', $item['bom_id'])
                                            ->first();

                                        if ($prsSupplierItemData) {
                                            $prsSupplierItemData->fill([
                                                'prs_supplier_id' => isset($item['prs_supplier_id']) ? $item['prs_supplier_id'] : null,
                                                'bom_id' => isset($item['bom_id']) ? $item['bom_id'] : null,
                                                'item_name' => isset($item['item_name']) ? $item['item_name'] : null,
                                                'inventory_id' => isset($item['inventory_id']) ? $item['inventory_id'] : null,
                                                'uom' => isset($item['uom']) ? $item['uom'] : null,
                                                'quantity' => isset($item['quantity']) ? $item['quantity'] : null,
                                                'unit_price' => isset($item['unit_price']) ? $item['unit_price'] : null,
                                                'is_deleted' => Response::FALSE,
                                            ]);
                                            $prsSupplierItemData->save();
                                        } else {
                                            $prsSupplierItemData = new PrsSupplierItem();
                                            $prsSupplierItemData->fill([
                                                'prs_supplier_id' => $prsSupplierData->id,
                                                'bom_id' => $item['bom_id'],
                                                'item_name' => $item['item_name'],
                                                'inventory_id' => $item['inventory_id'],
                                                'uom' => $item['uom'],
                                                'quantity' => $item['quantity'],
                                                'unit_price' => $item['unit_price'],
                                                'is_deleted' => Response::FALSE,
                                            ]);
                                            $prsSupplierItemData->save();
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return $prs->load(['customer', 'prs_details.prs_suppliers.prs_supplier_items']);
    }

    function delete($id)
    {
        $prs = Prs::findOrFail($id);
        $prs->delete();

        return $prs;
    }
}
