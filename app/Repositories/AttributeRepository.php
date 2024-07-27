<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\AttributeRequest;
use Carbon\Carbon;
use App\Models\Attribute;
use App\Response;

interface IAttributeRepository
{
    function getAll();
    function getById($id);
    function create(AttributeRequest $request);
    function update(AttributeRequest $request, $id);
    function delete($id);
}

class AttributeRepository implements IAttributeRepository
{
    function getAll()
    {
        $attributes = Attribute::with('product_attributes.product')->where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $attributes;
    }

    function getById($id)
    {
        $attribute = Attribute::findOrFail($id);
        return $attribute;
    }

    function create(AttributeRequest $request)
    {
        $latest = Attribute::orderBy('id', 'desc')->first();
        $validatedData = $request->validated();
        $randomNumber = Helper::generateRandomNumber(8);

        if (!$latest) {
            $initialBase36 = Helper::decimalToBase36(1);
            $validatedData['attribute_no'] = $initialBase36 . $randomNumber;
        } else {
            $initialBase36 = Helper::decimalToBase36($latest->id + 1);
            $validatedData['attribute_no'] = $initialBase36 . $randomNumber;
        }

        $validatedData['is_deleted'] = Response::FALSE;

        $attribute = Attribute::create($validatedData);
        return $attribute;
    }

    function update(AttributeRequest $request, $id)
    {
        $attribute = Attribute::findOrFail($id);
        $validatedData = $request->validated();
        $attribute->update($validatedData);

        return $attribute;
    }

    function delete($id)
    {
        $attribute = Attribute::findOrFail($id);
        $attribute->delete();

        return $attribute;
    }
}
