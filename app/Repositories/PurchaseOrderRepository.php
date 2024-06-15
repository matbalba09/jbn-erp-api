<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreatePurchaseOrderRequest;
use App\Http\Requests\UpdatePurchaseOrderRequest;
use Carbon\Carbon;
use App\Models\PurchaseOrder;
use App\Repositories\Interface\IPurchaseOrderRepository;
use App\Response;

class PurchaseOrderRepository implements IPurchaseOrderRepository
{
    function getAll()
    {
        $purchaseOrders = PurchaseOrder::get();
        return $purchaseOrders;
    }

    function getById($id)
    {
        $purchaseOrder = PurchaseOrder::findOrFail($id);
        return $purchaseOrder;
    }

    function create(CreatePurchaseOrderRequest $request)
    {
        $validatedData = $request->validated();

        $purchaseOrder = PurchaseOrder::create($validatedData);
        return $purchaseOrder;
    }

    function update(UpdatePurchaseOrderRequest $request, $id)
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
