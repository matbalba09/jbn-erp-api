<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\BomRequest;
use App\Http\Requests\CreateBomRequest;
use App\Http\Requests\UpdateBomRequest;
use Carbon\Carbon;
use App\Models\Bom;
use App\Response;

interface IBomRepository
{
    function getAll();
    function getById($id);
    function create(BomRequest $request);
    function update(BomRequest $request, $id);
    function delete($id);
}

class BomRepository implements IBomRepository
{
    function getAll()
    {
        $bom = Bom::with('bom_type')->where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $bom;
    }

    function getById($id)
    {
        $bom = Bom::with('bom_type')->findOrFail($id);
        return $bom;
    }

    function create(BomRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $bom = Bom::create($validatedData);
        return $bom->load('bom_type');
    }

    function update(BomRequest $request, $id)
    {
        $bom = Bom::findOrFail($id);
        $validatedData = $request->validated();
        $bom->update($validatedData);

        return $bom->load('bom_type');
    }

    function delete($id)
    {
        $bom = Bom::findOrFail($id);
        $bom->delete();

        return $bom;
    }
}
