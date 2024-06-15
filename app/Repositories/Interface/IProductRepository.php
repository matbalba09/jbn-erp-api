<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;

interface IProductRepository
{
    function getAll();
    function getById($id);
    function create(CreateProductRequest $request);
    function update(UpdateProductRequest $request, $id);
    function delete($id);
}