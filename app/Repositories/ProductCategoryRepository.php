<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreateProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use Carbon\Carbon;
use App\Models\ProductCategory;
use App\Repositories\Interface\IProductCategoryRepository;
use App\Response;

class ProductCategoryRepository implements IProductCategoryRepository
{
    function getAll()
    {
        $productCategories = ProductCategory::where('is_deleted', Response::FALSE)->get();
        return $productCategories;
    }

    function getById($id)
    {
        $productCategory = ProductCategory::findOrFail($id);
        return $productCategory;
    }

    function create(CreateProductCategoryRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $productCategory = ProductCategory::create($validatedData);
        return $productCategory;
    }

    function update(UpdateProductCategoryRequest $request, $id)
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
