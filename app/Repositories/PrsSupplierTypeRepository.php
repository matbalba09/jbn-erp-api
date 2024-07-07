<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreatePrsSupplierTypeRequest;
use App\Http\Requests\PrsSupplierTypeRequest;
use App\Http\Requests\UpdatePrsSupplierTypeRequest;
use Carbon\Carbon;
use App\Models\PrsSupplierType;
use App\Response;

interface IPrsSupplierTypeRepository
{
    function getAll();
    function getById($id);
    function create(PrsSupplierTypeRequest $request);
    function update(PrsSupplierTypeRequest $request, $id);
    function delete($id);
}

class PrsSupplierTypeRepository implements IPrsSupplierTypeRepository
{
    function getAll()
    {
        $prsSupplierTypes = PrsSupplierType::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $prsSupplierTypes;
    }

    function getById($id)
    {
        $prsSupplierType = PrsSupplierType::findOrFail($id);
        return $prsSupplierType;
    }

    function create(PrsSupplierTypeRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $prsSupplierType = PrsSupplierType::create($validatedData);
        return $prsSupplierType;
    }

    function update(PrsSupplierTypeRequest $request, $id)
    {
        $prsSupplierType = PrsSupplierType::findOrFail($id);
        $validatedData = $request->validated();
        $prsSupplierType->update($validatedData);

        return $prsSupplierType;
    }

    function delete($id)
    {
        $prsSupplierType = PrsSupplierType::findOrFail($id);
        $prsSupplierType->delete();

        return $prsSupplierType;
    }
}
