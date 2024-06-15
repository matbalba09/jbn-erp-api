<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreateSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;

interface ISupplierRepository
{
    function getAll();
    function getById($id);
    function create(CreateSupplierRequest $request);
    function update(UpdateSupplierRequest $request, $id);
    function delete($id);
}