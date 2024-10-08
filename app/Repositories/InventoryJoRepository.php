<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\InventoryJoRequest;
use App\Http\Requests\CreateInventoryJoRequest;
use App\Http\Requests\UpdateInventoryJoRequest;
use Carbon\Carbon;
use App\Models\InventoryJo;
use App\Response;

interface IInventoryJoRepository
{
    function getAll();
    function getById($id);
    function create(InventoryJoRequest $request);
    function update(InventoryJoRequest $request, $id);
    function delete($id);
}

class InventoryJoRepository implements IInventoryJoRepository
{
    function getAll()
    {
        $inventoryJos = InventoryJo::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $inventoryJos;
    }

    function getById($id)
    {
        $inventoryJo = InventoryJo::findOrFail($id);
        return $inventoryJo;
    }

    function create(InventoryJoRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $inventoryJo = InventoryJo::create($validatedData);
        return $inventoryJo;
    }

    function update(InventoryJoRequest $request, $id)
    {
        $inventoryJo = InventoryJo::findOrFail($id);
        $validatedData = $request->validated();
        $inventoryJo->update($validatedData);

        return $inventoryJo;
    }

    function delete($id)
    {
        $inventoryJo = InventoryJo::findOrFail($id);
        $inventoryJo->delete();

        return $inventoryJo;
    }
}
