<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreateServiceTypeRequest;
use App\Http\Requests\ServiceTypeRequest;
use App\Http\Requests\UpdateServiceTypeRequest;

interface IServiceTypeRepository
{
    function getAll();
    function getById($id);
    function create(ServiceTypeRequest $request);
    function update(ServiceTypeRequest $request, $id);
    function delete($id);
}