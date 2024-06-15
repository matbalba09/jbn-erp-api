<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

interface IOrderRepository
{
    function getAll();
    function getById($id);
    function create(CreateOrderRequest $request);
    function update(UpdateOrderRequest $request, $id);
    function delete($id);
}