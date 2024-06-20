<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreatePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;

interface IPaymentRepository
{
    function getAll();
    function getById($id);
    function create(CreatePaymentRequest $request);
    function update(UpdatePaymentRequest $request, $id);
    function delete($id);
}