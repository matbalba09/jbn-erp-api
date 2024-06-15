<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreateQuotationDetailRequest;
use App\Http\Requests\UpdateQuotationDetailRequest;

interface IQuotationDetailRepository
{
    function getAll();
    function getById($id);
    function create(CreateQuotationDetailRequest $request);
    function update(UpdateQuotationDetailRequest $request, $id);
    function delete($id);
}