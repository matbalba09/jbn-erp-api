<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreatePurchaseRequisitionDetailRequest;
use App\Http\Requests\PurchaseRequisitionDetailRequest;
use App\Http\Requests\UpdatePurchaseRequisitionDetailRequest;

interface IPurchaseRequisitionDetailRepository
{
    function getAll();
    function getById($id);
    function create(PurchaseRequisitionDetailRequest $request);
    function update(PurchaseRequisitionDetailRequest $request, $id);
    function delete($id);
}