<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreatePurchaseRequisitionSlipRequest;
use App\Http\Requests\UpdatePurchaseRequisitionSlipRequest;
use Carbon\Carbon;
use App\Models\PurchaseRequisitionSlip;
use App\Repositories\Interface\IPurchaseRequisitionSlipRepository;
use App\Response;

class PurchaseRequisitionSlipRepository implements IPurchaseRequisitionSlipRepository
{
    function getAll()
    {
        $purchaseRequisitionSlips = PurchaseRequisitionSlip::get();
        return $purchaseRequisitionSlips;
    }

    function getById($id)
    {
        $purchaseRequisitionSlip = PurchaseRequisitionSlip::findOrFail($id);
        return $purchaseRequisitionSlip;
    }

    function create(CreatePurchaseRequisitionSlipRequest $request)
    {
        $validatedData = $request->validated();

        $purchaseRequisitionSlip = PurchaseRequisitionSlip::create($validatedData);
        return $purchaseRequisitionSlip;
    }

    function update(UpdatePurchaseRequisitionSlipRequest $request, $id)
    {
        $purchaseRequisitionSlip = PurchaseRequisitionSlip::findOrFail($id);
        $validatedData = $request->validated();
        $purchaseRequisitionSlip->update($validatedData);

        return $purchaseRequisitionSlip;
    }

    function delete($id)
    {
        $purchaseRequisitionSlip = PurchaseRequisitionSlip::findOrFail($id);
        $purchaseRequisitionSlip->delete();

        return $purchaseRequisitionSlip;
    }
}
