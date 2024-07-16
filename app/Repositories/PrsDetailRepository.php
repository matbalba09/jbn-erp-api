<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreatePrsDetailRequest;
use App\Http\Requests\PrsDetailRequest;
use App\Http\Requests\UpdatePrsDetailRequest;
use Carbon\Carbon;
use App\Models\PrsDetail;
use App\Response;

interface IPrsDetailRepository
{
    function getAll();
    function getById($id);
    function create(PrsDetailRequest $request);
    function update(PrsDetailRequest $request, $id);
    function delete($id);
}

class PrsDetailRepository implements IPrsDetailRepository
{
    function getAll()
    {
        $prsDetails = PrsDetail::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $prsDetails;
    }

    function getById($id)
    {
        $prsDetail = PrsDetail::findOrFail($id);
        return $prsDetail;
    }

    function create(PrsDetailRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $prsDetail = PrsDetail::create($validatedData);
        return $prsDetail;
    }

    function update(PrsDetailRequest $request, $id)
    {
        $prsDetail = PrsDetail::findOrFail($id);
        $validatedData = $request->validated();
        $prsDetail->update($validatedData);

        return $prsDetail;
    }

    function delete($id)
    {
        $prsDetail = PrsDetail::findOrFail($id);
        $prsDetail->delete();

        return $prsDetail;
    }
}
