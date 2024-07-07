<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreatePurchaseOrderRequest;
use App\Http\Requests\PurchaseOrderRequest;
use App\Http\Requests\UpdatePurchaseOrderRequest;
use Carbon\Carbon;
use App\Models\PurchaseOrder;
use App\Repositories\Interface\IPurchaseOrderRepository;
use App\Response;

class PurchaseOrderRepository implements IPurchaseOrderRepository
{
    function getAll()
    {
        $purchaseOrders = PurchaseOrder::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $purchaseOrders;
    }

    function getById($id)
    {
        $purchaseOrder = PurchaseOrder::findOrFail($id);
        return $purchaseOrder;
    }

    function create(PurchaseOrderRequest $request)
    {
        $latestPurchaseOrder = PurchaseOrder::latest()->first();
        $dateNow = Carbon::now()->format('ymd');

        $validatedData = $request->validated();

        if (!$latestPurchaseOrder) {
            $initialBase36 = Helper::decimalToBase36(1);
            $validatedData['po_no'] = 'POR' . $dateNow . '-PR-' . $initialBase36;
        } else {
            $dateOfLatest = Helper::getFullDateFromNo($latestPurchaseOrder->po_no);
            if ($dateOfLatest != $dateNow) {
                $initialBase36 = Helper::decimalToBase36(1);
                $validatedData['po_no'] = 'POR' . $dateNow . '-PR-' . $initialBase36;
            } else {
                $base36 = Helper::getLastPart($latestPurchaseOrder->po_no);
                $decimal = Helper::base36ToDecimal($base36) + 1;
                $backToBase36 = Helper::decimalToBase36($decimal);
                $validatedData['po_no'] = 'POR' . $dateNow . '-PR-' . $backToBase36;
            }
        }
        $validatedData['is_deleted'] = Response::FALSE;

        $purchaseOrder = PurchaseOrder::create($validatedData);
        return $purchaseOrder;
    }

    function update(PurchaseOrderRequest $request, $id)
    {
        $purchaseOrder = PurchaseOrder::findOrFail($id);
        $validatedData = $request->validated();
        $purchaseOrder->update($validatedData);

        return $purchaseOrder;
    }

    function delete($id)
    {
        $purchaseOrder = PurchaseOrder::findOrFail($id);
        $purchaseOrder->delete();

        return $purchaseOrder;
    }
}
