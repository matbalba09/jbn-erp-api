<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreatePurchaseOrderRequest;
use App\Http\Requests\UpdatePurchaseOrderRequest;

interface IPurchaseOrderRepository
{
    function getAll();
    function getById($id);
    function create(CreatePurchaseOrderRequest $request);
    function update(UpdatePurchaseOrderRequest $request, $id);
    function delete($id);
}