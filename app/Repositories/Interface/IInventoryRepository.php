<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreateInventoryRequest;
use App\Http\Requests\InventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;

interface IInventoryRepository
{
    function getAll();
    function getById($id);
    function create(InventoryRequest $request);
    function update(InventoryRequest $request, $id);
    function delete($id);
}