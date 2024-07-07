<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\BomTypeRequest;
use App\Http\Requests\CreateBomTypeRequest;
use App\Http\Requests\UpdateBomTypeRequest;
use Carbon\Carbon;
use App\Models\BomType;
use App\Response;

interface IBomTypeRepository
{
    function getAll();
    function getById($id);
    function create(BomTypeRequest $request);
    function update(BomTypeRequest $request, $id);
    function delete($id);
}

class BomTypeRepository implements IBomTypeRepository
{
    function getAll()
    {
        $bomTypes = BomType::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $bomTypes;
    }

    function getById($id)
    {
        $bomType = BomType::findOrFail($id);
        return $bomType;
    }

    function create(BomTypeRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $bomType = BomType::create($validatedData);
        return $bomType;
    }

    function update(BomTypeRequest $request, $id)
    {
        $bomType = BomType::findOrFail($id);
        $validatedData = $request->validated();
        $bomType->update($validatedData);

        return $bomType;
    }

    function delete($id)
    {
        $bomType = BomType::findOrFail($id);
        $bomType->delete();

        return $bomType;
    }
}
