<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreateProductAttributeRequest;
use App\Http\Requests\ProductAttributeRequest;
use App\Http\Requests\UpdateProductAttributeRequest;

interface IProductAttributeRepository
{
    function getAll();
    function getById($id);
    function create(ProductAttributeRequest $request);
    function update(ProductAttributeRequest $request, $id);
    function delete($id);
}