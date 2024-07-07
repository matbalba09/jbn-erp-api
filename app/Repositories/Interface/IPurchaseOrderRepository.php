<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreatePurchaseOrderRequest;
use App\Http\Requests\PurchaseOrderRequest;
use App\Http\Requests\UpdatePurchaseOrderRequest;

interface IPurchaseOrderRepository
{
    function getAll();
    function getById($id);
    function create(PurchaseOrderRequest $request);
    function update(PurchaseOrderRequest $request, $id);
    function delete($id);
}