<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\SupplierV2Request;
use App\Http\Requests\CreateSupplierV2Request;
use App\Http\Requests\UpdateSupplierV2Request;
use Carbon\Carbon;
use App\Models\SupplierV2;
use App\Response;

interface ISupplierV2Repository
{
    function getAll();
    function getById($id);
    function create(SupplierV2Request $request);
    function update(SupplierV2Request $request, $id);
    function delete($id);
}

class SupplierV2Repository implements ISupplierV2Repository
{
    function getAll()
    {
        $supplierV2 = SupplierV2::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $supplierV2;
    }

    function getById($id)
    {
        $supplierV2 = SupplierV2::findOrFail($id);
        return $supplierV2;
    }

    function create(SupplierV2Request $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $supplierV2 = SupplierV2::create($validatedData);
        return $supplierV2;
    }

    function update(SupplierV2Request $request, $id)
    {
        $supplierV2 = SupplierV2::findOrFail($id);
        $validatedData = $request->validated();
        $supplierV2->update($validatedData);

        return $supplierV2;
    }

    function delete($id)
    {
        $supplierV2 = SupplierV2::findOrFail($id);
        $supplierV2->delete();

        return $supplierV2;
    }
}
