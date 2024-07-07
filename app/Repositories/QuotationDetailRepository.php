<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreateQuotationDetailRequest;
use App\Http\Requests\QuotationDetailRequest;
use App\Http\Requests\UpdateQuotationDetailRequest;
use Carbon\Carbon;
use App\Models\QuotationDetail;
use App\Response;

interface IQuotationDetailRepository
{
    function getAll();
    function getById($id);
    function create(QuotationDetailRequest $request);
    function update(QuotationDetailRequest $request, $id);
    function delete($id);
}

class QuotationDetailRepository implements IQuotationDetailRepository
{
    function getAll()
    {
        $quotationDetails = QuotationDetail::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $quotationDetails;
    }

    function getById($id)
    {
        $quotationDetail = QuotationDetail::findOrFail($id);
        return $quotationDetail;
    }

    function create(QuotationDetailRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $quotationDetail = QuotationDetail::create($validatedData);
        return $quotationDetail;
    }

    function update(QuotationDetailRequest $request, $id)
    {
        $quotationDetail = QuotationDetail::findOrFail($id);
        $validatedData = $request->validated();
        $quotationDetail->update($validatedData);

        return $quotationDetail;
    }

    function delete($id)
    {
        $quotationDetail = QuotationDetail::findOrFail($id);
        $quotationDetail->delete();

        return $quotationDetail;
    }
}
