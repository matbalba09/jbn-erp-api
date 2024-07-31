<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreateSupplierRequest;
use App\Http\Requests\SupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use Carbon\Carbon;
use App\Models\Supplier;
use App\Response;

interface ISupplierRepository
{
    function getAll();
    function getById($id);
    function create(SupplierRequest $request);
    function update(SupplierRequest $request, $id);
    function delete($id);
}

class SupplierRepository implements ISupplierRepository
{
    function getAll()
    {
        $suppliers = Supplier::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $suppliers;
    }

    function getById($id)
    {
        $supplier = Supplier::findOrFail($id);
        return $supplier;
    }

    function create(SupplierRequest $request)
    {
        $latest = Supplier::orderBy('id', 'desc')->first();
        $validatedData = $request->validated();
        $randomNumber = Helper::generateRandomNumber(8);

        if (!$latest) {
            $initialBase36 = Helper::decimalToBase36(1);
            $validatedData['supplier_no'] = $initialBase36 . $randomNumber;
        } else {
            $initialBase36 = Helper::decimalToBase36($latest->id + 1);
            $validatedData['supplier_no'] = $initialBase36 . $randomNumber;
        }

        $validatedData['is_deleted'] = Response::FALSE;

        $supplier = Supplier::create($validatedData);
        return $supplier;
    }

    function update(SupplierRequest $request, $id)
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
