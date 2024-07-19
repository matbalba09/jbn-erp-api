<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Carbon\Carbon;
use App\Models\Order;
use App\Response;

interface IOrderRepository
{
    function getAll();
    function getById($id);
    function create(OrderRequest $request);
    function update(OrderRequest $request, $id);
    function delete($id);
    
    function getPrsSupplierById($id);
}

class OrderRepository implements IOrderRepository
{
    function getAll()
    {
        $orders = Order::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $orders;
    }

    function getById($id)
    {
        $order = Order::findOrFail($id);
        return $order;
    }

    function create(OrderRequest $request)
    {
        $latestOrder = Order::latest()->first();
        $dateNow = Carbon::now()->format('ymd');

        $validatedData = $request->validated();

        if (!$latestOrder) {
            $initialBase36 = Helper::decimalToBase36(1);
            $validatedData['order_no'] = 'ORD' . $dateNow . '-SR-' . $initialBase36;
        } else {
            $dateOfLatest = Helper::getFullDateFromNo($latestOrder->order_no);
            if ($dateOfLatest != $dateNow) {
                $initialBase36 = Helper::decimalToBase36(1);
                $validatedData['order_no'] = 'ORD' . $dateNow . '-SR-' . $initialBase36;
            } else {
                $base36 = Helper::getLastPart($latestOrder->order_no);
                $decimal = Helper::base36ToDecimal($base36) + 1;
                $backToBase36 = Helper::decimalToBase36($decimal);
                $validatedData['order_no'] = 'ORD' . $dateNow . '-SR-' . $backToBase36;
            }
        }
        $validatedData['is_deleted'] = Response::FALSE;

        $order = Order::create($validatedData);
        return $order;
    }

    function update(OrderRequest $request, $id)
    {
        $order = Order::findOrFail($id);
        $validatedData = $request->validated();
        $order->update($validatedData);

        return $order;
    }

    function delete($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return $order;
    }

    function getPrsSupplierById($id)
    {
        $order = Order::with('quotation.prs.prs_details.prs_suppliers')
        ->findOrFail($id);
        return $order;
    }
}
