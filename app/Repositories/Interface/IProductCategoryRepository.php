<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreateProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;

interface IProductCategoryRepository
{
    function getAll();
    function getById($id);
    function create(CreateProductCategoryRequest $request);
    function update(UpdateProductCategoryRequest $request, $id);
    function delete($id);
}