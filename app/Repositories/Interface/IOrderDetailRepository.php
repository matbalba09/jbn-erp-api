<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreateOrderDetailRequest;
use App\Http\Requests\OrderDetailRequest;
use App\Http\Requests\UpdateOrderDetailRequest;

interface IOrderDetailRepository
{
    function getAll();
    function getById($id);
    function create(OrderDetailRequest $request);
    function update(OrderDetailRequest $request, $id);
    function delete($id);
}