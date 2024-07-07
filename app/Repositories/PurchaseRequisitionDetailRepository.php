<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreatePurchaseRequisitionDetailRequest;
use App\Http\Requests\PurchaseRequisitionDetailRequest;
use App\Http\Requests\UpdatePurchaseRequisitionDetailRequest;
use Carbon\Carbon;
use App\Models\PurchaseRequisitionDetail;
use App\Response;

interface IPurchaseRequisitionDetailRepository
{
    function getAll();
    function getById($id);
    function create(PurchaseRequisitionDetailRequest $request);
    function update(PurchaseRequisitionDetailRequest $request, $id);
    function delete($id);
}

class PurchaseRequisitionDetailRepository implements IPurchaseRequisitionDetailRepository
{
    function getAll()
    {
        $purchaseRequisitionDetails = PurchaseRequisitionDetail::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $purchaseRequisitionDetails;
    }

    function getById($id)
    {
        $purchaseRequisitionDetail = PurchaseRequisitionDetail::findOrFail($id);
        return $purchaseRequisitionDetail;
    }

    function create(PurchaseRequisitionDetailRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $purchaseRequisitionDetail = PurchaseRequisitionDetail::create($validatedData);
        return $purchaseRequisitionDetail;
    }

    function update(PurchaseRequisitionDetailRequest $request, $id)
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
