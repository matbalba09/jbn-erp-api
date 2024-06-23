<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreatePurchaseRequisitionRequest;
use App\Http\Requests\UpdatePurchaseRequisitionRequest;
use Carbon\Carbon;
use App\Models\PurchaseRequisition;
use App\Repositories\Interface\IPurchaseRequisitionRepository;
use App\Response;

class PurchaseRequisitionRepository implements IPurchaseRequisitionRepository
{
    function getAll()
    {
        $purchaseRequisitions = PurchaseRequisition::where('is_deleted', Response::FALSE)->get();
        return $purchaseRequisitions;
    }

    function getById($id)
    {
        $purchaseRequisition = PurchaseRequisition::findOrFail($id);
        return $purchaseRequisition;
    }

    function create(CreatePurchaseRequisitionRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $purchaseRequisition = PurchaseRequisition::create($validatedData);
        return $purchaseRequisition;
    }

    function update(UpdatePurchaseRequisitionRequest $request, $id)
    {
        $purchaseRequisition = PurchaseRequisition::findOrFail($id);
        $validatedData = $request->validated();
        $purchaseRequisition->update($validatedData);

        return $purchaseRequisition;
    }

    function delete($id)
    {
        $purchaseRequisition = PurchaseRequisition::findOrFail($id);
        $purchaseRequisition->delete();

        return $purchaseRequisition;
    }
}
