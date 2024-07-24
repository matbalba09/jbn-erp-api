<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\PoDetailRequest;
use Carbon\Carbon;
use App\Models\PoDetail;
use App\Response;

interface IPoDetailRepository
{
    function getAll();
    function getById($id);
    function create(PoDetailRequest $request);
    function update(PoDetailRequest $request, $id);
    function delete($id);
}

class PoDetailRepository implements IPoDetailRepository
{
    function getAll()
    {
        $poDetails = PoDetail::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $poDetails;
    }

    function getById($id)
    {
        $poDetail = PoDetail::findOrFail($id);
        return $poDetail;
    }

    function create(PoDetailRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $poDetail = PoDetail::create($validatedData);
        return $poDetail;
    }

    function update(PoDetailRequest $request, $id)
    {
        $poDetail = PoDetail::findOrFail($id);
        $validatedData = $request->validated();
        $poDetail->update($validatedData);

        return $poDetail;
    }

    function delete($id)
    {
        $poDetail = PoDetail::findOrFail($id);
        $poDetail->delete();

        return $poDetail;
    }
}
