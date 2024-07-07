<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreatePrsSupplierTypeRequest;
use App\Http\Requests\PrsSupplierTypeRequest;
use App\Http\Requests\UpdatePrsSupplierTypeRequest;

interface IPrsSupplierTypeRepository
{
    function getAll();
    function getById($id);
    function create(PrsSupplierTypeRequest $request);
    function update(PrsSupplierTypeRequest $request, $id);
    function delete($id);
}