<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreateProductCategoryRequest;
use App\Http\Requests\ProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use Carbon\Carbon;
use App\Models\ProductCategory;
use App\Response;

interface IProductCategoryRepository
{
    function getAll();
    function getById($id);
    function create(ProductCategoryRequest $request);
    function update(ProductCategoryRequest $request, $id);
    function delete($id);
}

class ProductCategoryRepository implements IProductCategoryRepository
{
    function getAll()
    {
        $productCategories = ProductCategory::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $productCategories;
    }

    function getById($id)
    {
        $productCategory = ProductCategory::findOrFail($id);
        return $productCategory;
    }

    function create(ProductCategoryRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $productCategory = ProductCategory::create($validatedData);
        return $productCategory;
    }

    function update(ProductCategoryRequest $request, $id)
    {
        $productCategory = ProductCategory::findOrFail($id);
        $validatedData = $request->validated();
        $productCategory->update($validatedData);

        return $productCategory;
    }

    function delete($id)
    {
        $productCategory = ProductCategory::findOrFail($id);
        $productCategory->delete();

        return $productCategory;
    }
}
