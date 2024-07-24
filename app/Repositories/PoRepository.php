<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\PoRequest;
use Carbon\Carbon;
use App\Models\Po;
use App\Response;

interface IPoRepository
{
    function getAll();
    function getById($id);
    function create(PoRequest $request);
    function update(PoRequest $request, $id);
    function delete($id);
}

class PoRepository implements IPoRepository
{
    function getAll()
    {
        $po = Po::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $po;
    }

    function getById($id)
    {
        $po = Po::findOrFail($id);
        return $po;
    }

    function create(PoRequest $request)
    {
        $latestPo = Po::latest()->first();
        $dateNow = Carbon::now()->format('ymd');

        $validatedData = $request->validated();

        if (!$latestPo) {
            $initialBase36 = Helper::decimalToBase36(1);
            $validatedData['po_no'] = 'POR' . $dateNow . '-PR-' . $initialBase36;
        } else {
            $dateOfLatest = Helper::getFullDateFromNo($latestPo->po_no);
            if ($dateOfLatest != $dateNow) {
                $initialBase36 = Helper::decimalToBase36(1);
                $validatedData['po_no'] = 'POR' . $dateNow . '-PR-' . $initialBase36;
            } else {
                $base36 = Helper::getLastPart($latestPo->po_no);
                $decimal = Helper::base36ToDecimal($base36) + 1;
                $backToBase36 = Helper::decimalToBase36($decimal);
                $validatedData['po_no'] = 'POR' . $dateNow . '-PR-' . $backToBase36;
            }
        }
        $validatedData['is_deleted'] = Response::FALSE;

        $po = Po::create($validatedData);
        return $po;
    }

    function update(PoRequest $request, $id)
    {
        $po = Po::findOrFail($id);
        $validatedData = $request->validated();
        $po->update($validatedData);

        return $po;
    }

    function delete($id)
    {
        $po = Po::findOrFail($id);
        $po->delete();

        return $po;
    }
}
