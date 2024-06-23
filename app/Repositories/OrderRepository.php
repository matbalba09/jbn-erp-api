<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Carbon\Carbon;
use App\Models\Order;
use App\Repositories\Interface\IOrderRepository;
use App\Response;

class OrderRepository implements IOrderRepository
{
    function getAll()
    {
        $orders = Order::where('is_deleted', Response::FALSE)->get();
        return $orders;
    }

    function getById($id)
    {
        $order = Order::findOrFail($id);
        return $order;
    }

    function create(CreateOrderRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $order = Order::create($validatedData);
        return $order;
    }

    function update(UpdateOrderRequest $request, $id)
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
}
