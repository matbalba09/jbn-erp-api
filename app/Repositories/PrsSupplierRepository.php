<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreatePrsSupplierRequest;
use App\Http\Requests\PrsSupplierRequest;
use App\Http\Requests\UpdatePrsSupplierRequest;
use Carbon\Carbon;
use App\Models\PrsSupplier;
use App\Response;

interface IPrsSupplierRepository
{
    function getAll();
    function getById($id);
    function create(PrsSupplierRequest $request);
    function update(PrsSupplierRequest $request, $id);
    function delete($id);
}

class PrsSupplierRepository implements IPrsSupplierRepository
{
    function getAll()
    {
        $prsSuppliers = PrsSupplier::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $prsSuppliers;
    }

    function getById($id)
    {
        $prsSupplier = PrsSupplier::findOrFail($id);
        return $prsSupplier;
    }

    function create(PrsSupplierRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $prsSupplier = PrsSupplier::create($validatedData);
        return $prsSupplier;
    }

    function update(PrsSupplierRequest $request, $id)
    {
        $prsSupplier = PrsSupplier::findOrFail($id);
        $validatedData = $request->validated();
        $prsSupplier->update($validatedData);

        return $prsSupplier;
    }

    function delete($id)
    {
        $prsSupplier = PrsSupplier::findOrFail($id);
        $prsSupplier->delete();

        return $prsSupplier;
    }
}
