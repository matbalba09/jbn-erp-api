<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreateInventoryTransactionRequest;
use App\Http\Requests\UpdateInventoryTransactionRequest;

interface IInventoryTransactionRepository
{
    function getAll();
    function getById($id);
    function create(CreateInventoryTransactionRequest $request);
    function update(UpdateInventoryTransactionRequest $request, $id);
    function delete($id);
}