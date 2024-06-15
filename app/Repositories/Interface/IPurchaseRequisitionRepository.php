<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreatePurchaseRequisitionRequest;
use App\Http\Requests\UpdatePurchaseRequisitionRequest;

interface IPurchaseRequisitionRepository
{
    function getAll();
    function getById($id);
    function create(CreatePurchaseRequisitionRequest $request);
    function update(UpdatePurchaseRequisitionRequest $request, $id);
    function delete($id);
}