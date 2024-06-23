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
        $prs = PurchaseRequisition::where('is_deleted', Response::FALSE)->get();
        return $prs;
    }

    function getById($id)
    {
        $prs = PurchaseRequisition::findOrFail($id);
        return $prs;
    }

    function create(CreatePurchaseRequisitionRequest $request)
    {
        $latestPrs = PurchaseRequisition::latest()->first();
        $yearNow = Carbon::now()->format('y');
        $dateNow = Carbon::now()->format('ymd');
        $decimal = Helper::base36ToDecimal('01Z');

        $validatedData = $request->validated();

        if (!$latestPrs) {
            $initialBase36 = Helper::decimalToBase36(1);
            $validatedData['prs_no'] = 'PRS' . $dateNow . '-SR-' . $initialBase36;
        } else {
            $yearOfLatest = Helper::getYearFromNo($latestPrs->prs_no);
            if ($yearOfLatest != $yearNow) {
                $initialBase36 = Helper::decimalToBase36(1);
                $validatedData['prs_no'] = 'PRS' . $dateNow . '-SR-' . $initialBase36;
            } else {
                $base36 = Helper::getLastPart($latestPrs->prs_no);
                $decimal = Helper::base36ToDecimal($base36) + 1;
                $backToBase36 = Helper::decimalToBase36($decimal);
                $validatedData['prs_no'] = 'PRS' . $dateNow . '-SR-' . $backToBase36;
            }
        }

        $validatedData['is_deleted'] = Response::FALSE;

        $prs = PurchaseRequisition::create($validatedData);
        return $prs;
    }

    function update(UpdatePurchaseRequisitionRequest $request, $id)
    {
        $prs = PurchaseRequisition::findOrFail($id);
        $validatedData = $request->validated();
        $prs->update($validatedData);

        return $prs;
    }

    function delete($id)
    {
        $prs = PurchaseRequisition::findOrFail($id);
        $prs->delete();

        return $prs;
    }
}
