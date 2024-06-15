<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreateInventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;

interface IInventoryRepository
{
    function getAll();
    function getById($id);
    function create(CreateInventoryRequest $request);
    function update(UpdateInventoryRequest $request, $id);
    function delete($id);
}