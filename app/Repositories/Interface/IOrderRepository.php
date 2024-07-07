<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\UpdateOrderRequest;

interface IOrderRepository
{
    function getAll();
    function getById($id);
    function create(OrderRequest $request);
    function update(OrderRequest $request, $id);
    function delete($id);
}