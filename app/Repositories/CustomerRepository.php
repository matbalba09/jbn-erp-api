<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Carbon\Carbon;
use App\Models\Customer;
use App\Repositories\Interface\ICustomerRepository;
use App\Response;

class CustomerRepository implements ICustomerRepository
{
    function getAll()
    {
        $customers = Customer::get();
        return $customers;
    }

    function getById($id)
    {
        $customer = Customer::findOrFail($id);
        return $customer;
    }

    function create(CreateCustomerRequest $request)
    {
        $validatedData = $request->validated();

        $customer = Customer::create($validatedData);
        return $customer;
    }

    function update(UpdateCustomerRequest $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $validatedData = $request->validated();
        $customer->update($validatedData);

        return $customer;
    }

    function delete($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return $customer;
    }
}
