<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Carbon\Carbon;
use App\Models\Product;
use App\Repositories\Interface\IProductRepository;
use App\Response;

class ProductRepository implements IProductRepository
{
    function getAll()
    {
        $products = Product::where('is_deleted', Response::FALSE)->get();
        return $products;
    }

    function getById($id)
    {
        $product = Product::findOrFail($id);
        return $product;
    }

    function create(CreateProductRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $product = Product::create($validatedData);
        return $product;
    }

    function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $validatedData = $request->validated();
        $product->update($validatedData);

        return $product;
    }

    function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return $product;
    }
}
