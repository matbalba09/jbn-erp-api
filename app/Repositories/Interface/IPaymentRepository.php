<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreatePaymentRequest;
use App\Http\Requests\PaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;

interface IPaymentRepository
{
    function getAll();
    function getById($id);
    function create(PaymentRequest $request);
    function update(PaymentRequest $request, $id);
    function delete($id);
}