<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\ProductionJoRequest;
use App\Http\Requests\CreateProductionJoRequest;
use App\Http\Requests\UpdateProductionJoRequest;
use Carbon\Carbon;
use App\Models\ProductionJo;
use App\Response;

interface IProductionJoRepository
{
    function getAll();
    function getById($id);
    function create(ProductionJoRequest $request);
    function update(ProductionJoRequest $request, $id);
    function delete($id);
}

class ProductionJoRepository implements IProductionJoRepository
{
    function getAll()
    {
        $productionJos = ProductionJo::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $productionJos;
    }

    function getById($id)
    {
        $productionJo = ProductionJo::findOrFail($id);
        return $productionJo;
    }

    function create(ProductionJoRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $productionJo = ProductionJo::create($validatedData);
        return $productionJo;
    }

    function update(ProductionJoRequest $request, $id)
    {
        $productionJo = ProductionJo::findOrFail($id);
        $validatedData = $request->validated();
        $productionJo->update($validatedData);

        return $productionJo;
    }

    function delete($id)
    {
        $productionJo = ProductionJo::findOrFail($id);
        $productionJo->delete();

        return $productionJo;
    }
}
