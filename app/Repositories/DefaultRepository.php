<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\DefaultRequest;
use Carbon\Carbon;
use App\Models\Default;
use App\Response;

interface IDefaultRepository
{
    // function getAll();
    // function getById($id);
    // function create(DefaultRequest $request);
    // function update(DefaultRequest $request, $id);
    // function delete($id);
}

class DefaultRepository implements IDefaultRepository
{
    // function getAll()
    // {
    //     $bom = Default::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
    //     return $bom;
    // }

    // function getById($id)
    // {
    //     $bom = Default::findOrFail($id);
    //     return $bom;
    // }

    // function create(DefaultRequest $request)
    // {
    //     $validatedData = $request->validated();
    //     $validatedData['is_deleted'] = Response::FALSE;

    //     $bom = Default::create($validatedData);
    //     return $bom;
    // }

    // function update(DefaultRequest $request, $id)
    // {
    //     $bom = Default::findOrFail($id);
    //     $validatedData = $request->validated();
    //     $bom->update($validatedData);

    //     return $bom;
    // }

    // function delete($id)
    // {
    //     $bom = Default::findOrFail($id);
    //     $bom->delete();

    //     return $bom;
    // }
}
