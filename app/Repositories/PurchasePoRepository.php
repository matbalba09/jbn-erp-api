<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\PurchasePoRequest;
use App\Http\Requests\CreatePurchasePoRequest;
use App\Http\Requests\UpdatePurchasePoRequest;
use Carbon\Carbon;
use App\Models\PurchasePo;
use App\Response;

interface IPurchasePoRepository
{
    function getAll();
    function getById($id);
    function create(PurchasePoRequest $request);
    function update(PurchasePoRequest $request, $id);
    function delete($id);
}

class PurchasePoRepository implements IPurchasePoRepository
{
    function getAll()
    {
        $purchasePos = PurchasePo::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $purchasePos;
    }

    function getById($id)
    {
        $purchasePo = PurchasePo::findOrFail($id);
        return $purchasePo;
    }

    function create(PurchasePoRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $purchasePo = PurchasePo::create($validatedData);
        return $purchasePo;
    }

    function update(PurchasePoRequest $request, $id)
    {
        $purchasePo = PurchasePo::findOrFail($id);
        $validatedData = $request->validated();
        $purchasePo->update($validatedData);

        return $purchasePo;
    }

    function delete($id)
    {
        $purchasePo = PurchasePo::findOrFail($id);
        $purchasePo->delete();

        return $purchasePo;
    }
}
