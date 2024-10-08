<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\PurchasePrsRequest;
use App\Http\Requests\CreatePurchasePrsRequest;
use App\Http\Requests\UpdatePurchasePrsRequest;
use Carbon\Carbon;
use App\Models\PurchasePrs;
use App\Response;

interface IPurchasePrsRepository
{
    function getAll();
    function getById($id);
    function create(PurchasePrsRequest $request);
    function update(PurchasePrsRequest $request, $id);
    function delete($id);
}

class PurchasePrsRepository implements IPurchasePrsRepository
{
    function getAll()
    {
        $purchasePrs = PurchasePrs::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $purchasePrs;
    }

    function getById($id)
    {
        $purchasePrs = PurchasePrs::findOrFail($id);
        return $purchasePrs;
    }

    function create(PurchasePrsRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $purchasePrs = PurchasePrs::create($validatedData);
        return $purchasePrs;
    }

    function update(PurchasePrsRequest $request, $id)
    {
        $purchasePrs = PurchasePrs::findOrFail($id);
        $validatedData = $request->validated();
        $purchasePrs->update($validatedData);

        return $purchasePrs;
    }

    function delete($id)
    {
        $purchasePrs = PurchasePrs::findOrFail($id);
        $purchasePrs->delete();

        return $purchasePrs;
    }
}
