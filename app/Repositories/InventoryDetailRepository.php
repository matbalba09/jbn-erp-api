<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreateInventoryDetailRequest;
use App\Http\Requests\UpdateInventoryDetailRequest;
use Carbon\Carbon;
use App\Models\InventoryDetail;
use App\Repositories\Interface\IInventoryDetailRepository;
use App\Response;

class InventoryDetailRepository implements IInventoryDetailRepository
{
    function getAll()
    {
        $inventoryDetails = InventoryDetail::get();
        return $inventoryDetails;
    }

    function getById($id)
    {
        $inventoryDetail = InventoryDetail::findOrFail($id);
        return $inventoryDetail;
    }

    function create(CreateInventoryDetailRequest $request)
    {
        $validatedData = $request->validated();

        $inventoryDetail = InventoryDetail::create($validatedData);
        return $inventoryDetail;
    }

    function update(UpdateInventoryDetailRequest $request, $id)
    {
        $inventoryDetail = InventoryDetail::findOrFail($id);
        $validatedData = $request->validated();
        $inventoryDetail->update($validatedData);

        return $inventoryDetail;
    }

    function delete($id)
    {
        $inventoryDetail = InventoryDetail::findOrFail($id);
        $inventoryDetail->delete();

        return $inventoryDetail;
    }
}
