<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\ProductionDetailRequest;
use App\Http\Requests\CreateProductionDetailRequest;
use App\Http\Requests\UpdateProductionDetailRequest;
use Carbon\Carbon;
use App\Models\ProductionDetail;
use App\Response;

interface IProductionDetailRepository
{
    function getAll();
    function getById($id);
    function create(ProductionDetailRequest $request);
    function update(ProductionDetailRequest $request, $id);
    function delete($id);
}

class ProductionDetailRepository implements IProductionDetailRepository
{
    function getAll()
    {
        $productionDetails = ProductionDetail::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $productionDetails;
    }

    function getById($id)
    {
        $productionDetail = ProductionDetail::findOrFail($id);
        return $productionDetail;
    }

    function create(ProductionDetailRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $productionDetail = ProductionDetail::create($validatedData);
        return $productionDetail;
    }

    function update(ProductionDetailRequest $request, $id)
    {
        $productionDetail = ProductionDetail::findOrFail($id);
        $validatedData = $request->validated();
        $productionDetail->update($validatedData);

        return $productionDetail;
    }

    function delete($id)
    {
        $productionDetail = ProductionDetail::findOrFail($id);
        $productionDetail->delete();

        return $productionDetail;
    }
}
