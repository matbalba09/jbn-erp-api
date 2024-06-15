<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreatePurchaseRequisitionDetailRequest;
use App\Http\Requests\UpdatePurchaseRequisitionDetailRequest;

interface IPurchaseRequisitionDetailRepository
{
    function getAll();
    function getById($id);
    function create(CreatePurchaseRequisitionDetailRequest $request);
    function update(UpdatePurchaseRequisitionDetailRequest $request, $id);
    function delete($id);
}