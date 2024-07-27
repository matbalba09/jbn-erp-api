<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreateProductAttributeRequest;
use App\Http\Requests\ProductAttributeRequest;
use App\Http\Requests\UpdateProductAttributeRequest;
use Carbon\Carbon;
use App\Models\ProductAttribute;
use App\Response;

interface IProductAttributeRepository
{
    function getAll();
    function getById($id);
    function create(ProductAttributeRequest $request);
    function update(ProductAttributeRequest $request, $id);
    function delete($id);
}

class ProductAttributeRepository implements IProductAttributeRepository
{
    function getAll()
    {
        $productAttributes = ProductAttribute::with('product', 'attribute')->where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $productAttributes;
    }

    function getById($id)
    {
        $productAttribute = ProductAttribute::with('product', 'attribute')->findOrFail($id);
        return $productAttribute;
    }

    function create(ProductAttributeRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $productAttribute = ProductAttribute::create($validatedData);
        return $productAttribute;
    }

    function update(ProductAttributeRequest $request, $id)
    {
        $productAttribute = ProductAttribute::findOrFail($id);
        $validatedData = $request->validated();
        $productAttribute->update($validatedData);

        return $productAttribute;
    }

    function delete($id)
    {
        $productAttribute = ProductAttribute::findOrFail($id);
        $productAttribute->delete();

        return $productAttribute;
    }
}
