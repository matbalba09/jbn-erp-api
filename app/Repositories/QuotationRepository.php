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
        $quotations = Quotation::get();
        return $quotations;
    }

    function getById($id)
    {
        $quotation = Quotation::findOrFail($id);
        return $quotation;
    }

    function create(CreateQuotationRequest $request)
    {
        $validatedData = $request->validated();

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
