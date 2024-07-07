<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

interface ICategoryRepository
{
    function getAll();
    function getById($id);
    function create(CategoryRequest $request);
    function update(CategoryRequest $request, $id);
    function delete($id);
}