<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreateQuotationRequest;
use App\Http\Requests\UpdateQuotationRequest;

interface IQuotationRepository
{
    function getAll();
    function getById($id);
    function create(CreateQuotationRequest $request);
    function update(UpdateQuotationRequest $request, $id);
    function delete($id);
}