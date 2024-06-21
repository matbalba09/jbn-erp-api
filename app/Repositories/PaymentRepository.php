<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreatePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use Carbon\Carbon;
use App\Models\Payment;
use App\Repositories\Interface\IPaymentRepository;
use App\Response;

class PaymentRepository implements IPaymentRepository
{
    function getAll()
    {
        $payments = Payment::get();
        return $payments;
    }

    function getById($id)
    {
        $payment = Payment::findOrFail($id);
        return $payment;
    }

    function create(CreatePaymentRequest $request)
    {
        $validatedData = $request->validated();

        $payment = Payment::create($validatedData);
        return $payment;
    }

    function update(UpdatePaymentRequest $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $validatedData = $request->validated();
        $payment->update($validatedData);

        return $payment;
    }

    function delete($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return $payment;
    }
}
