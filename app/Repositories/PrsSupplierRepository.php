<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreatePrsSupplierRequest;
use App\Http\Requests\UpdatePrsSupplierRequest;
use Carbon\Carbon;
use App\Models\PrsSupplier;
use App\Repositories\Interface\IPrsSupplierRepository;
use App\Response;

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

    function create(CreatePrsSupplierRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $prsSupplier = PrsSupplier::create($validatedData);
        return $prsSupplier;
    }

    function update(UpdatePrsSupplierRequest $request, $id)
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
