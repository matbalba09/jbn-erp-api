<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

interface ICustomerRepository
{
    function getAll();
    function getById($id);
    function create(CustomerRequest $request);
    function update(CustomerRequest $request, $id);
    function delete($id);
}