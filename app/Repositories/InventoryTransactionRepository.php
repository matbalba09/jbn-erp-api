<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreateInventoryTransactionRequest;
use App\Http\Requests\UpdateInventoryTransactionRequest;
use Carbon\Carbon;
use App\Models\InventoryTransaction;
use App\Repositories\Interface\IInventoryTransactionRepository;
use App\Response;

class InventoryTransactionRepository implements IInventoryTransactionRepository
{
    function getAll()
    {
        $inventoryTransactions = InventoryTransaction::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $inventoryTransactions;
    }

    function getById($id)
    {
        $inventoryTransaction = InventoryTransaction::findOrFail($id);
        return $inventoryTransaction;
    }

    function create(CreateInventoryTransactionRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $inventoryTransaction = InventoryTransaction::create($validatedData);
        return $inventoryTransaction;
    }

    function update(UpdateInventoryTransactionRequest $request, $id)
    {
        $inventoryTransaction = InventoryTransaction::findOrFail($id);
        $validatedData = $request->validated();
        $inventoryTransaction->update($validatedData);

        return $inventoryTransaction;
    }

    function delete($id)
    {
        $inventoryTransaction = InventoryTransaction::findOrFail($id);
        $inventoryTransaction->delete();

        return $inventoryTransaction;
    }
}
