<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;

interface IProductRepository
{
    function getAll();
    function getById($id);
    function create(ProductRequest $request);
    function update(ProductRequest $request, $id);
    function delete($id);
}