<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Carbon\Carbon;
use App\Models\Category;
use App\Response;

interface ICategoryRepository
{
    function getAll();
    function getById($id);
    function create(CategoryRequest $request);
    function update(CategoryRequest $request, $id);
    function delete($id);
}

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
        $latest = Category::orderBy('id', 'desc')->first();
        $validatedData = $request->validated();
        $randomNumber = Helper::generateRandomNumber(8);

        if (!$latest) {
            $initialBase36 = Helper::decimalToBase36(1);
            $validatedData['category_no'] = $initialBase36 . $randomNumber;
        } else {
            $initialBase36 = Helper::decimalToBase36($latest->id + 1);
            $validatedData['category_no'] = $initialBase36 . $randomNumber;
        }

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
