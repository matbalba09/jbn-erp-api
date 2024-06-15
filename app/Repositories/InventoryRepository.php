<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreateInventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;
use Carbon\Carbon;
use App\Models\Inventory;
use App\Repositories\Interface\IInventoryRepository;
use App\Response;

class InventoryRepository implements IInventoryRepository
{
    function getAll()
    {
        $inventories = Inventory::get();
        return $inventories;
    }

    function getById($id)
    {
        $inventory = Inventory::findOrFail($id);
        return $inventory;
    }

    function create(CreateInventoryRequest $request)
    {
        $validatedData = $request->validated();

        $inventory = Inventory::create($validatedData);
        return $inventory;
    }

    function update(UpdateInventoryRequest $request, $id)
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
