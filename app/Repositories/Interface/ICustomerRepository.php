<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

interface ICustomerRepository
{
    function getAll();
    function getById($id);
    function create(CreateCustomerRequest $request);
    function update(UpdateCustomerRequest $request, $id);
    function delete($id);
}