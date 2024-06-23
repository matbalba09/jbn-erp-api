<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreatePurchaseRequisitionDetailRequest;
use App\Http\Requests\UpdatePurchaseRequisitionDetailRequest;
use Carbon\Carbon;
use App\Models\PurchaseRequisitionDetail;
use App\Repositories\Interface\IPurchaseRequisitionDetailRepository;
use App\Response;

class PurchaseRequisitionDetailRepository implements IPurchaseRequisitionDetailRepository
{
    function getAll()
    {
        $purchaseRequisitionDetails = PurchaseRequisitionDetail::where('is_deleted', Response::FALSE)->get();
        return $purchaseRequisitionDetails;
    }

    function getById($id)
    {
        $purchaseRequisitionDetail = PurchaseRequisitionDetail::findOrFail($id);
        return $purchaseRequisitionDetail;
    }

    function create(CreatePurchaseRequisitionDetailRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $purchaseRequisitionDetail = PurchaseRequisitionDetail::create($validatedData);
        return $purchaseRequisitionDetail;
    }

    function update(UpdatePurchaseRequisitionDetailRequest $request, $id)
    {
        $purchaseRequisitionDetail = PurchaseRequisitionDetail::findOrFail($id);
        $validatedData = $request->validated();
        $purchaseRequisitionDetail->update($validatedData);

        return $purchaseRequisitionDetail;
    }

    function delete($id)
    {
        $purchaseRequisitionDetail = PurchaseRequisitionDetail::findOrFail($id);
        $purchaseRequisitionDetail->delete();

        return $purchaseRequisitionDetail;
    }
}
