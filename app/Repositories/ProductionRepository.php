<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\ProductionRequest;
use App\Http\Requests\CreateProductionRequest;
use App\Http\Requests\UpdateProductionRequest;
use Carbon\Carbon;
use App\Models\Production;
use App\Response;

interface IProductionRepository
{
    function getAll();
    function getById($id);
    function create(ProductionRequest $request);
    function update(ProductionRequest $request, $id);
    function delete($id);
}

class ProductionRepository implements IProductionRepository
{
    function getAll()
    {
        $productions = Production::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $productions;
    }

    function getById($id)
    {
        $production = Production::findOrFail($id);
        return $production;
    }

    function create(ProductionRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $production = Production::create($validatedData);
        return $production;
    }

    function update(ProductionRequest $request, $id)
    {
        $production = Production::findOrFail($id);
        $validatedData = $request->validated();
        $production->update($validatedData);

        return $production;
    }

    function delete($id)
    {
        $production = Production::findOrFail($id);
        $production->delete();

        return $production;
    }
}
