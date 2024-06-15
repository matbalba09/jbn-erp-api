<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreateOrderDetailRequest;
use App\Http\Requests\UpdateOrderDetailRequest;

interface IOrderDetailRepository
{
    function getAll();
    function getById($id);
    function create(CreateOrderDetailRequest $request);
    function update(UpdateOrderDetailRequest $request, $id);
    function delete($id);
}