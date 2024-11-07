<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\RawMaterialRequest;
use App\Http\Requests\CreateRawMaterialRequest;
use App\Http\Requests\UpdateRawMaterialRequest;
use Carbon\Carbon;
use App\Models\RawMaterial;
use App\Response;

interface IRawMaterialRepository
{
    function getAll();
    function getById($id);
    function create(RawMaterialRequest $request);
    function update(RawMaterialRequest $request, $id);
    function delete($id);

    function getByMakerMaterialColorSize(RawMaterialRequest $request);
}

class RawMaterialRepository implements IRawMaterialRepository
{
    function getAll()
    {
        $rawMaterials = RawMaterial::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $rawMaterials;
    }

    function getById($id)
    {
        $rawMaterial = RawMaterial::findOrFail($id);
        return $rawMaterial;
    }

    function create(RawMaterialRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $rawMaterial = RawMaterial::create($validatedData);
        return $rawMaterial;
    }

    function update(RawMaterialRequest $request, $id)
    {
        $rawMaterial = RawMaterial::findOrFail($id);
        $validatedData = $request->validated();
        $rawMaterial->update($validatedData);

        return $rawMaterial;
    }

    function delete($id)
    {
        $rawMaterial = RawMaterial::findOrFail($id);
        $rawMaterial->delete();

        return $rawMaterial;
    }

    function getByMakerMaterialColorSize(RawMaterialRequest $request)
    {
        $validatedData = $request->validated();

        $rawMaterial = RawMaterial::where('maker', $validatedData['maker'])
            ->where('material', $validatedData['material'])
            ->where('color', $validatedData['color'])
            ->where('size', $validatedData['size'])
            ->first();

        if ($rawMaterial != null) {
            return $rawMaterial;
        }else{
            return null;
        }
    }
}
