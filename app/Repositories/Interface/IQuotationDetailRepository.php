<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreateQuotationDetailRequest;
use App\Http\Requests\QuotationDetailRequest;
use App\Http\Requests\UpdateQuotationDetailRequest;

interface IQuotationDetailRepository
{
    function getAll();
    function getById($id);
    function create(QuotationDetailRequest $request);
    function update(QuotationDetailRequest $request, $id);
    function delete($id);
}