<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\ProductLaborCostRequest;
use App\Http\Requests\CreateProductLaborCostRequest;
use App\Http\Requests\UpdateProductLaborCostRequest;
use Carbon\Carbon;
use App\Models\ProductLaborCost;
use App\Response;

interface IProductLaborCostRepository
{
    function getAll();
    function getById($id);
    function create(ProductLaborCostRequest $request);
    function update(ProductLaborCostRequest $request, $id);
    function delete($id);
}

class ProductLaborCostRepository implements IProductLaborCostRepository
{
    function getAll()
    {
        $productLaborCosts = ProductLaborCost::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $productLaborCosts;
    }

    function getById($id)
    {
        $productLaborCost = ProductLaborCost::findOrFail($id);
        return $productLaborCost;
    }

    function create(ProductLaborCostRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $productLaborCost = ProductLaborCost::create($validatedData);
        return $productLaborCost;
    }

    function update(ProductLaborCostRequest $request, $id)
    {
        $productLaborCost = ProductLaborCost::findOrFail($id);
        $validatedData = $request->validated();
        $productLaborCost->update($validatedData);

        return $productLaborCost;
    }

    function delete($id)
    {
        $productLaborCost = ProductLaborCost::findOrFail($id);
        $productLaborCost->delete();

        return $productLaborCost;
    }
}
