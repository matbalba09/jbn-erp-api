<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreatePrsSupplierRequest;
use App\Http\Requests\UpdatePrsSupplierRequest;

interface IPrsSupplierRepository
{
    function getAll();
    function getById($id);
    function create(CreatePrsSupplierRequest $request);
    function update(UpdatePrsSupplierRequest $request, $id);
    function delete($id);
}