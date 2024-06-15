<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreateSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use Carbon\Carbon;
use App\Models\Supplier;
use App\Repositories\Interface\ISupplierRepository;
use App\Response;

class SupplierRepository implements ISupplierRepository
{
    function getAll()
    {
        $suppliers = Supplier::get();
        return $suppliers;
    }

    function getById($id)
    {
        $supplier = Supplier::findOrFail($id);
        return $supplier;
    }

    function create(CreateSupplierRequest $request)
    {
        $validatedData = $request->validated();

        $supplier = Supplier::create($validatedData);
        return $supplier;
    }

    function update(UpdateSupplierRequest $request, $id)
    {
        $supplier = Supplier::findOrFail($id);
        $validatedData = $request->validated();
        $supplier->update($validatedData);

        return $supplier;
    }

    function delete($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return $supplier;
    }
}
