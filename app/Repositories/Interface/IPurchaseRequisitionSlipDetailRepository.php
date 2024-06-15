<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreatePurchaseRequisitionSlipDetailRequest;
use App\Http\Requests\UpdatePurchaseRequisitionSlipDetailRequest;

interface IPurchaseRequisitionSlipDetailRepository
{
    function getAll();
    function getById($id);
    function create(CreatePurchaseRequisitionSlipDetailRequest $request);
    function update(UpdatePurchaseRequisitionSlipDetailRequest $request, $id);
    function delete($id);
}