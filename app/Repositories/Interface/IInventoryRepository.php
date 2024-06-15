<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

interface IInventoryRepository
{
    function getAll();
    function getById($id);
    function create(CreateInventoryRequest $request);
    function update(UpdateInventoryRequest $request, $id);
    function delete($id);
}