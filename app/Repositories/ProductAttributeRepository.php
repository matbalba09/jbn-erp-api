<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreateProductAttributeRequest;
use App\Http\Requests\UpdateProductAttributeRequest;
use Carbon\Carbon;
use App\Models\ProductAttribute;
use App\Repositories\Interface\IProductAttributeRepository;
use App\Response;

class ProductAttributeRepository implements IProductAttributeRepository
{
    function getAll()
    {
        $productAttributes = ProductAttribute::where('is_deleted', Response::FALSE)->get();
        return $productAttributes;
    }

    function getById($id)
    {
        $productAttribute = ProductAttribute::findOrFail($id);
        return $productAttribute;
    }

    function create(CreateProductAttributeRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $productAttribute = ProductAttribute::create($validatedData);
        return $productAttribute;
    }

    function update(UpdateProductAttributeRequest $request, $id)
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
