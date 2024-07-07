<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreatePrsSupplierItemRequest;
use App\Http\Requests\PrsSupplierItemRequest;
use App\Http\Requests\UpdatePrsSupplierItemRequest;
use Carbon\Carbon;
use App\Models\PrsSupplierItem;
use App\Response;

interface IPrsSupplierItemRepository
{
    function getAll();
    function getById($id);
    function create(PrsSupplierItemRequest $request);
    function update(PrsSupplierItemRequest $request, $id);
    function delete($id);
}

class PrsSupplierItemRepository implements IPrsSupplierItemRepository
{
    function getAll()
    {
        $prsSupplierItems = PrsSupplierItem::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $prsSupplierItems;
    }

    function getById($id)
    {
        $prsSupplierItem = PrsSupplierItem::findOrFail($id);
        return $prsSupplierItem;
    }

    function create(PrsSupplierItemRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $prsSupplierItem = PrsSupplierItem::create($validatedData);
        return $prsSupplierItem;
    }

    function update(PrsSupplierItemRequest $request, $id)
    {
        $prsSupplierItem = PrsSupplierItem::findOrFail($id);
        $validatedData = $request->validated();
        $prsSupplierItem->update($validatedData);

        return $prsSupplierItem;
    }

    function delete($id)
    {
        $prsSupplierItem = PrsSupplierItem::findOrFail($id);
        $prsSupplierItem->delete();

        return $prsSupplierItem;
    }
}
