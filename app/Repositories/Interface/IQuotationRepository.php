<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreateQuotationRequest;
use App\Http\Requests\QuotationRequest;
use App\Http\Requests\UpdateQuotationRequest;

interface IQuotationRepository
{
    function getAll();
    function getById($id);
    function create(QuotationRequest $request);
    function update(QuotationRequest $request, $id);
    function delete($id);
}