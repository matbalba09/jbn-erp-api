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
        $prs = PurchaseRequisition::with('customer')->where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $prs;
    }

    function getById($id)
    {
        $prs = PurchaseRequisition::with('customer')->findOrFail($id);
        return $prs;
    }

    function create(CreatePurchaseRequisitionRequest $request)
    {
        $latestPrs = PurchaseRequisition::latest()->first();
        $dateNow = Carbon::now()->format('ymd');

        $validatedData = $request->validated();

        if (!$latestPrs) {
            $initialBase36 = Helper::decimalToBase36(1);
            $validatedData['prs_no'] = 'PRS' . $dateNow . '-SR-' . $initialBase36;
        } else {
            $dateOfLatest = Helper::getFullDateFromNo($latestPrs->prs_no);
            if ($dateOfLatest != $dateNow) {
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
        return $prs->load('customer');
    }

    function update(UpdatePurchaseRequisitionRequest $request, $id)
    {
        $prs = PurchaseRequisition::findOrFail($id);
        $validatedData = $request->validated();
        $prs->update($validatedData);

        return $prs->load('customer');
    }

    function delete($id)
    {
        $prs = PurchaseRequisition::findOrFail($id);
        $prs->delete();

        return $prs;
    }
}
