<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreateInventoryRequest;
use App\Http\Requests\InventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;
use Carbon\Carbon;
use App\Models\Inventory;
use App\Repositories\Interface\IInventoryRepository;
use App\Response;

class InventoryRepository implements IInventoryRepository
{
    function getAll()
    {
        $inventories = Inventory::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $inventories;
    }

    function getById($id)
    {
        $inventory = Inventory::findOrFail($id);
        return $inventory;
    }

    function create(InventoryRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $inventory = Inventory::create($validatedData);
        return $inventory;
    }

    function update(InventoryRequest $request, $id)
    {
        $inventory = Inventory::findOrFail($id);
        $validatedData = $request->validated();
        $inventory->update($validatedData);

        return $inventory;
    }

    function delete($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();

        return $inventory;
    }
}
