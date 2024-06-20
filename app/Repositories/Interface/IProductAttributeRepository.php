<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreateProductAttributeRequest;
use App\Http\Requests\UpdateProductAttributeRequest;

interface IProductAttributeRepository
{
    function getAll();
    function getById($id);
    function create(CreateProductAttributeRequest $request);
    function update(UpdateProductAttributeRequest $request, $id);
    function delete($id);
}