<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreateInventoryTransactionRequest;
use App\Http\Requests\InventoryTransactionRequest;
use App\Http\Requests\UpdateInventoryTransactionRequest;

interface IInventoryTransactionRepository
{
    function getAll();
    function getById($id);
    function create(InventoryTransactionRequest $request);
    function update(InventoryTransactionRequest $request, $id);
    function delete($id);
}