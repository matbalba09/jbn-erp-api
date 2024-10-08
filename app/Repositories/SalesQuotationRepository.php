<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\SalesQuotationRequest;
use App\Http\Requests\CreateSalesQuotationRequest;
use App\Http\Requests\UpdateSalesQuotationRequest;
use Carbon\Carbon;
use App\Models\SalesQuotation;
use App\Response;

interface ISalesQuotationRepository
{
    function getAll();
    function getById($id);
    function create(SalesQuotationRequest $request);
    function update(SalesQuotationRequest $request, $id);
    function delete($id);
}

class SalesQuotationRepository implements ISalesQuotationRepository
{
    function getAll()
    {
        $salesQuotations = SalesQuotation::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $salesQuotations;
    }

    function getById($id)
    {
        $salesQuotation = SalesQuotation::findOrFail($id);
        return $salesQuotation;
    }

    function create(SalesQuotationRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $salesQuotation = SalesQuotation::create($validatedData);
        return $salesQuotation;
    }

    function update(SalesQuotationRequest $request, $id)
    {
        $salesQuotation = SalesQuotation::findOrFail($id);
        $validatedData = $request->validated();
        $salesQuotation->update($validatedData);

        return $salesQuotation;
    }

    function delete($id)
    {
        $salesQuotation = SalesQuotation::findOrFail($id);
        $salesQuotation->delete();

        return $salesQuotation;
    }
}
