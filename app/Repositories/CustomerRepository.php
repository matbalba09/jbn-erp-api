<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Carbon\Carbon;
use App\Models\Customer;
use App\Response;

interface ICustomerRepository
{
    function getAll();
    function getById($id);
    function create(CustomerRequest $request);
    function update(CustomerRequest $request, $id);
    function delete($id);
}

class CustomerRepository implements ICustomerRepository
{
    function getAll()
    {
        $customers = Customer::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $customers;
    }

    function getById($id)
    {
        $customer = Customer::findOrFail($id);
        return $customer;
    }

    function create(CustomerRequest $request)
    {
        $latestCustomer = Customer::latest()->first();
        $dateNow = Carbon::now()->format('ymd');

        $validatedData = $request->validated();

        if (!$latestCustomer) {
            $initialBase36 = Helper::decimalToBase36(1);
            $validatedData['customer_no'] = 'CUS' . $dateNow . '-SR-' . $initialBase36;
        } else {
            $dateOfLatest = Helper::getFullDateFromNo($latestCustomer->customer_no);
            if ($dateOfLatest != $dateNow) {
                $initialBase36 = Helper::decimalToBase36(1);
                $validatedData['customer_no'] = 'CUS' . $dateNow . '-SR-' . $initialBase36;
            } else {
                $base36 = Helper::getLastPart($latestCustomer->customer_no);
                $decimal = Helper::base36ToDecimal($base36) + 1;
                $backToBase36 = Helper::decimalToBase36($decimal);
                $validatedData['customer_no'] = 'CUS' . $dateNow . '-SR-' . $backToBase36;
            }
        }
        $validatedData['is_deleted'] = Response::FALSE;

        $customer = Customer::create($validatedData);
        return $customer;
    }

    function update(CustomerRequest $request, $id)
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
