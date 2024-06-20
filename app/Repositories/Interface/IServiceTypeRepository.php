<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreateServiceTypeRequest;
use App\Http\Requests\UpdateServiceTypeRequest;

interface IServiceTypeRepository
{
    function getAll();
    function getById($id);
    function create(CreateServiceTypeRequest $request);
    function update(UpdateServiceTypeRequest $request, $id);
    function delete($id);
}