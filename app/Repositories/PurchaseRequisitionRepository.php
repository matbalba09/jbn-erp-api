<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreatePrsSupplierRequest;
use App\Http\Requests\CreatePurchaseRequisitionDetailRequest;
use App\Http\Requests\CreatePurchaseRequisitionRequest;
use App\Http\Requests\UpdatePurchaseRequisitionRequest;
use App\Models\PrsSupplier;
use Carbon\Carbon;
use App\Models\PurchaseRequisition;
use App\Models\PurchaseRequisitionDetail;
use App\Repositories\Interface\IPurchaseRequisitionRepository;
use App\Response;

class PurchaseRequisitionRepository implements IPurchaseRequisitionRepository
{
    function getAll()
    {
        $prs = PurchaseRequisition::with('customer')
            ->with('products')
            ->where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $prs;
    }

    function getById($id)
    {
        $prs = PurchaseRequisition::with('customer')
            ->with('products')
            ->findOrFail($id);
        return $prs;
    }

    function create(CreatePurchaseRequisitionRequest $request)
    {
        $latestPrs = PurchaseRequisition::latest()->first();
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

        $prs = PurchaseRequisition::create($validatedData);

        $products = $request->input('products');
        if ($products) {
            foreach ($products as $product) {
                $prsDetail = PurchaseRequisitionDetail::create([
                    'prs_id' => $prs->id,
                    'product_id' => isset($product['product_id']) ? $product['product_id'] : null,
                    'name' => isset($product['name']) ? $product['name'] : null,
                    'uom' => isset($product['uom']) ? $product['uom'] : null,
                    'quantity' => isset($product['quantity']) ? $product['quantity'] : null,
                    'unit_price' => isset($product['unit_price']) ? $product['unit_price'] : null,
                    'total_price' => isset($product['total_price']) ? $product['total_price'] : null,
                    'remarks' => isset($product['remarks']) ? $product['remarks'] : null,
                    'is_deleted' => Response::FALSE,
                ]);

                if (isset($product['prs_suppliers'])) {
                    foreach ($product['prs_suppliers'] as $supplier) {
                        PrsSupplier::create([
                            'prs_detail_id' => $prsDetail->id,
                            'bom_id' => isset($supplier['bom_id']) ? $supplier['bom_id'] : null,
                            'supplier_id' => isset($supplier['supplier_id']) ? $supplier['supplier_id'] : null,
                            'quantity' => $prsDetail->quantity,
                            'uom' => $prsDetail->uom,
                            'price' => isset($supplier['price']) ? $supplier['price'] : null,
                            'prs_supplier_type_id' => isset($supplier['prs_supplier_type_id']) ? $supplier['prs_supplier_type_id'] : null,
                            'is_deleted' => Response::FALSE,
                        ]);
                    }
                }
            }
        }
        return $prs->load(['customer', 'products.prs_supplier.supplier']);
    }

    function update(UpdatePurchaseRequisitionRequest $request, $id)
    {
        $prs = PurchaseRequisition::findOrFail($id);
        $validatedData = $request->validated();
        $prs->update($validatedData);

        return $prs->load(['customer', 'prs_details']);
    }

    function delete($id)
    {
        $prs = PurchaseRequisition::findOrFail($id);
        $prs->delete();

        return $prs;
    }
}
