<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreatePrsSupplierTypeRequest;
use App\Http\Requests\UpdatePrsSupplierTypeRequest;

interface IPrsSupplierTypeRepository
{
    function getAll();
    function getById($id);
    function create(CreatePrsSupplierTypeRequest $request);
    function update(UpdatePrsSupplierTypeRequest $request, $id);
    function delete($id);
}