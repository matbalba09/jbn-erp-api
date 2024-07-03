<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreateBomRequest;
use App\Http\Requests\UpdateBomRequest;
use Carbon\Carbon;
use App\Models\Bom;
use App\Repositories\Interface\IBomRepository;
use App\Response;

class BomRepository implements IBomRepository
{
    function getAll()
    {
        $bom = Bom::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $bom;
    }

    function getById($id)
    {
        $bom = Bom::findOrFail($id);
        return $bom;
    }

    function create(CreateBomRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $bom = Bom::create($validatedData);
        return $bom;
    }

    function update(UpdateBomRequest $request, $id)
    {
        $bom = Bom::findOrFail($id);
        $validatedData = $request->validated();
        $bom->update($validatedData);

        return $bom;
    }

    function delete($id)
    {
        $bom = Bom::findOrFail($id);
        $bom->delete();

        return $bom;
    }
}
