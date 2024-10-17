<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\LaborCostRequest;
use App\Http\Requests\CreateLaborCostRequest;
use App\Http\Requests\UpdateLaborCostRequest;
use Carbon\Carbon;
use App\Models\LaborCost;
use App\Models\Product;
use App\Response;

interface ILaborCostRepository
{
    function getAll();
    function getById($id);
    function create(LaborCostRequest $request);
    function update(LaborCostRequest $request, $id);
    function delete($id);
}

class LaborCostRepository implements ILaborCostRepository
{
    function getAll()
    {
        $laborCost = LaborCost::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $laborCost;
    }

    function getById($id)
    {
        $laborCost = LaborCost::findOrFail($id);
        return $laborCost;
    }

    function create(LaborCostRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $laborCost = LaborCost::create($validatedData);
        return $laborCost;
    }

    function update(LaborCostRequest $request, $id)
    {
        $laborCost = LaborCost::findOrFail($id);
        $validatedData = $request->validated();
        $laborCost->update($validatedData);

        return $laborCost;
    }

    function delete($id)
    {
        $laborCost = LaborCost::findOrFail($id);
        $laborCost->delete();

        return $laborCost;
    }
}
