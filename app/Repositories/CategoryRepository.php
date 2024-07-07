<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Carbon\Carbon;
use App\Models\Category;
use App\Repositories\Interface\ICategoryRepository;
use App\Response;

class CategoryRepository implements ICategoryRepository
{
    function getAll()
    {
        $categories = Category::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $categories;
    }

    function getById($id)
    {
        $category = Category::findOrFail($id);
        return $category;
    }

    function create(CategoryRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $category = Category::create($validatedData);
        return $category;
    }

    function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $validatedData = $request->validated();
        $category->update($validatedData);

        return $category;
    }

    function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return $category;
    }
}
