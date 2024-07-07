<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreateSupplierRequest;
use App\Http\Requests\SupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;

interface ISupplierRepository
{
    function getAll();
    function getById($id);
    function create(SupplierRequest $request);
    function update(SupplierRequest $request, $id);
    function delete($id);
}