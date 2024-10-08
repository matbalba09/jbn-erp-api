<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\InventoryPoRequest;
use App\Http\Requests\CreateInventoryPoRequest;
use App\Http\Requests\UpdateInventoryPoRequest;
use Carbon\Carbon;
use App\Models\InventoryPo;
use App\Response;

interface IInventoryPoRepository
{
    function getAll();
    function getById($id);
    function create(InventoryPoRequest $request);
    function update(InventoryPoRequest $request, $id);
    function delete($id);
}

class InventoryPoRepository implements IInventoryPoRepository
{
    function getAll()
    {
        $inventoryPos = InventoryPo::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $inventoryPos;
    }

    function getById($id)
    {
        $inventoryPo = InventoryPo::findOrFail($id);
        return $inventoryPo;
    }

    function create(InventoryPoRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $inventoryPo = InventoryPo::create($validatedData);
        return $inventoryPo;
    }

    function update(InventoryPoRequest $request, $id)
    {
        $inventoryPo = InventoryPo::findOrFail($id);
        $validatedData = $request->validated();
        $inventoryPo->update($validatedData);

        return $inventoryPo;
    }

    function delete($id)
    {
        $inventoryPo = InventoryPo::findOrFail($id);
        $inventoryPo->delete();

        return $inventoryPo;
    }
}
