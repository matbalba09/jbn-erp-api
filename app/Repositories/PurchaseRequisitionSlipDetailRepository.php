<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreatePurchaseRequisitionSlipDetailRequest;
use App\Http\Requests\UpdatePurchaseRequisitionSlipDetailRequest;
use Carbon\Carbon;
use App\Models\PurchaseRequisitionSlipDetail;
use App\Repositories\Interface\IPurchaseRequisitionSlipDetailRepository;
use App\Response;

class PurchaseRequisitionSlipDetailRepository implements IPurchaseRequisitionSlipDetailRepository
{
    function getAll()
    {
        $purchaseRequisitionSlipDetails = PurchaseRequisitionSlipDetail::get();
        return $purchaseRequisitionSlipDetails;
    }

    function getById($id)
    {
        $purchaseRequisitionSlipDetail = PurchaseRequisitionSlipDetail::findOrFail($id);
        return $purchaseRequisitionSlipDetail;
    }

    function create(CreatePurchaseRequisitionSlipDetailRequest $request)
    {
        $validatedData = $request->validated();

        $purchaseRequisitionSlipDetail = PurchaseRequisitionSlipDetail::create($validatedData);
        return $purchaseRequisitionSlipDetail;
    }

    function update(UpdatePurchaseRequisitionSlipDetailRequest $request, $id)
    {
        $purchaseRequisitionSlipDetail = PurchaseRequisitionSlipDetail::findOrFail($id);
        $validatedData = $request->validated();
        $purchaseRequisitionSlipDetail->update($validatedData);

        return $purchaseRequisitionSlipDetail;
    }

    function delete($id)
    {
        $purchaseRequisitionSlipDetail = PurchaseRequisitionSlipDetail::findOrFail($id);
        $purchaseRequisitionSlipDetail->delete();

        return $purchaseRequisitionSlipDetail;
    }
}
