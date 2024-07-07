<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreatePrsSupplierRequest;
use App\Http\Requests\PrsSupplierRequest;
use App\Http\Requests\UpdatePrsSupplierRequest;

interface IPrsSupplierRepository
{
    function getAll();
    function getById($id);
    function create(PrsSupplierRequest $request);
    function update(PrsSupplierRequest $request, $id);
    function delete($id);
}