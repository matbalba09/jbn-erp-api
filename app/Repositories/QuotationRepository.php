<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreateQuotationRequest;
use App\Http\Requests\UpdateQuotationRequest;
use Carbon\Carbon;
use App\Models\Quotation;
use App\Repositories\Interface\IQuotationRepository;
use App\Response;

class QuotationRepository implements IQuotationRepository
{
    function getAll()
    {
        $quotations = Quotation::where('is_deleted', Response::FALSE)->get();
        return $quotations;
    }

    function getById($id)
    {
        $quotation = Quotation::findOrFail($id);
        return $quotation;
    }

    function create(CreateQuotationRequest $request)
    {
        $latestQuotation = Quotation::latest()->first();
        $dateNow = Carbon::now()->format('ymd');

        $validatedData = $request->validated();

        if (!$latestQuotation) {
            $initialBase36 = Helper::decimalToBase36(1);
            $validatedData['quotation_no'] = 'QUO' . $dateNow . '-SR-' . $initialBase36;
        } else {
            $dateOfLatest = Helper::getFullDateFromNo($latestQuotation->quotation_no);
            if ($dateOfLatest != $dateNow) {
                $initialBase36 = Helper::decimalToBase36(1);
                $validatedData['quotation_no'] = 'QUO' . $dateNow . '-SR-' . $initialBase36;
            } else {
                $base36 = Helper::getLastPart($latestQuotation->quotation_no);
                $decimal = Helper::base36ToDecimal($base36) + 1;
                $backToBase36 = Helper::decimalToBase36($decimal);
                $validatedData['quotation_no'] = 'QUO' . $dateNow . '-SR-' . $backToBase36;
            }
        }
        $validatedData['is_deleted'] = Response::FALSE;

        $quotation = Quotation::create($validatedData);
        return $quotation;
    }

    function update(UpdateQuotationRequest $request, $id)
    {
        $quotation = Quotation::findOrFail($id);
        $validatedData = $request->validated();
        $quotation->update($validatedData);

        return $quotation;
    }

    function delete($id)
    {
        $quotation = Quotation::findOrFail($id);
        $quotation->delete();

        return $quotation;
    }
}
