<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

interface ICategoryRepository
{
    function getAll();
    function getById($id);
    function create(CreateCategoryRequest $request);
    function update(UpdateCategoryRequest $request, $id);
    function delete($id);
}