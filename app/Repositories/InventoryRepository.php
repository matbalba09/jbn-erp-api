<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreateInventoryRequest;
use App\Http\Requests\InventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;
use Carbon\Carbon;
use App\Models\Inventory;
use App\Response;

interface IInventoryRepository
{
    function getAll();
    function getById($id);
    function create(InventoryRequest $request);
    function update(InventoryRequest $request, $id);
    function delete($id);
}

class InventoryRepository implements IInventoryRepository
{
    function getAll()
    {
        $inventories = Inventory::with('inventory_transactions')->where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $inventories;
    }

    function getById($id)
    {
        $inventory = Inventory::with('inventory_transactions')->findOrFail($id);
        return $inventory;
    }

    function create(InventoryRequest $request)
    {
        $latest = Inventory::orderBy('id', 'desc')->first();
        $validatedData = $request->validated();
        $randomNumber = Helper::generateRandomNumber(8);

        if (!$latest) {
            $initialBase36 = Helper::decimalToBase36(1);
            $validatedData['item_code'] = $initialBase36 . $randomNumber;
        } else {
            $initialBase36 = Helper::decimalToBase36($latest->id + 1);
            $validatedData['item_code'] = $initialBase36 . $randomNumber;
        }

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
