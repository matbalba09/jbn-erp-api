<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreateInventoryDetailRequest;
use App\Http\Requests\UpdateInventoryDetailRequest;

interface IInventoryDetailRepository
{
    function getAll();
    function getById($id);
    function create(CreateInventoryDetailRequest $request);
    function update(UpdateInventoryDetailRequest $request, $id);
    function delete($id);
}