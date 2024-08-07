<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreateOrderDetailRequest;
use App\Http\Requests\OrderDetailRequest;
use App\Http\Requests\UpdateOrderDetailRequest;
use Carbon\Carbon;
use App\Models\OrderDetail;
use App\Response;

interface IOrderDetailRepository
{
    function getAll();
    function getById($id);
    function create(OrderDetailRequest $request);
    function update(OrderDetailRequest $request, $id);
    function delete($id);
}

class OrderDetailRepository implements IOrderDetailRepository
{
    function getAll()
    {
        $orderDetails = OrderDetail::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $orderDetails;
    }

    function getById($id)
    {
        $orderDetail = OrderDetail::findOrFail($id);
        return $orderDetail;
    }

    function create(OrderDetailRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $orderDetail = OrderDetail::create($validatedData);
        return $orderDetail;
    }

    function update(OrderDetailRequest $request, $id)
    {
        $orderDetail = OrderDetail::findOrFail($id);
        $validatedData = $request->validated();
        $orderDetail->update($validatedData);

        return $orderDetail;
    }

    function delete($id)
    {
        $orderDetail = OrderDetail::findOrFail($id);
        $orderDetail->delete();

        return $orderDetail;
    }
}
