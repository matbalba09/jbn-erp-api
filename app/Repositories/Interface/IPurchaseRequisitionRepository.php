<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreatePurchaseRequisitionRequest;
use App\Http\Requests\PurchaseRequisitionRequest;
use App\Http\Requests\UpdatePurchaseRequisitionRequest;

interface IPurchaseRequisitionRepository
{
    function getAll();
    function getById($id);
    function create(PurchaseRequisitionRequest $request);
    function update(PurchaseRequisitionRequest $request, $id);
    function delete($id);
}