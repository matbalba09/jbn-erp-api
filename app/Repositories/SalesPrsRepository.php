<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\SalesPrsRequest;
use App\Http\Requests\CreateSalesPrsRequest;
use App\Http\Requests\UpdateSalesPrsRequest;
use Carbon\Carbon;
use App\Models\SalesPrs;
use App\Response;

interface ISalesPrsRepository
{
    function getAll();
    function getById($id);
    function create(SalesPrsRequest $request);
    function update(SalesPrsRequest $request, $id);
    function delete($id);
}

class SalesPrsRepository implements ISalesPrsRepository
{
    function getAll()
    {
        $salesPrs = SalesPrs::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $salesPrs;
    }

    function getById($id)
    {
        $salesPrs = SalesPrs::findOrFail($id);
        return $salesPrs;
    }

    function create(SalesPrsRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $salesPrs = SalesPrs::create($validatedData);
        return $salesPrs;
    }

    function update(SalesPrsRequest $request, $id)
    {
        $salesPrs = SalesPrs::findOrFail($id);
        $validatedData = $request->validated();
        $salesPrs->update($validatedData);

        return $salesPrs;
    }

    function delete($id)
    {
        $salesPrs = SalesPrs::findOrFail($id);
        $salesPrs->delete();

        return $salesPrs;
    }
}
