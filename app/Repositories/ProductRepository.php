<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Carbon\Carbon;
use App\Models\Product;
use App\Response;

interface IProductRepository
{
    function getAll();
    function getById($id);
    function create(ProductRequest $request);
    function update(ProductRequest $request, $id);
    function delete($id);
}

class ProductRepository implements IProductRepository
{
    function getAll()
    {
        $products = Product::with('product_attributes.attribute')->where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $products;
    }

    function getById($id)
    {
        $product = Product::with('product_attributes.attribute')->findOrFail($id);
        return $product;
    }

    function create(ProductRequest $request)
    {
        $latestProduct = Product::latest()->first();
        $dateNow = Carbon::now()->format('ymd');

        $validatedData = $request->validated();

        if (!$latestProduct) {
            $initialBase36 = Helper::decimalToBase36(1);
            $validatedData['product_no'] = 'PRD' . $dateNow . '-AD-' . $initialBase36;
        } else {
            $dateOfLatest = Helper::getFullDateFromNo($latestProduct->product_no);
            if ($dateOfLatest != $dateNow) {
                $initialBase36 = Helper::decimalToBase36(1);
                $validatedData['product_no'] = 'PRD' . $dateNow . '-AD-' . $initialBase36;
            } else {
                $base36 = Helper::getLastPart($latestProduct->product_no);
                $decimal = Helper::base36ToDecimal($base36) + 1;
                $backToBase36 = Helper::decimalToBase36($decimal);
                $validatedData['product_no'] = 'PRD' . $dateNow . '-AD-' . $backToBase36;
            }
        }
        $validatedData['is_deleted'] = Response::FALSE;

        $product = Product::create($validatedData);
        return $product;
    }

    function update(ProductRequest $request, $id)
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
