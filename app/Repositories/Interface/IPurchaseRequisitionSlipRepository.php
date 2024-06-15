<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreatePurchaseRequisitionSlipRequest;
use App\Http\Requests\UpdatePurchaseRequisitionSlipRequest;

interface IPurchaseRequisitionSlipRepository
{
    function getAll();
    function getById($id);
    function create(CreatePurchaseRequisitionSlipRequest $request);
    function update(UpdatePurchaseRequisitionSlipRequest $request, $id);
    function delete($id);
}