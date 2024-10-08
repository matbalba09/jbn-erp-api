<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\JoDetailRequest;
use App\Http\Requests\CreateJoDetailRequest;
use App\Http\Requests\UpdateJoDetailRequest;
use Carbon\Carbon;
use App\Models\JoDetail;
use App\Response;

interface IJoDetailRepository
{
    function getAll();
    function getById($id);
    function create(JoDetailRequest $request);
    function update(JoDetailRequest $request, $id);
    function delete($id);
}

class JoDetailRepository implements IJoDetailRepository
{
    function getAll()
    {
        $joDetails = JoDetail::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $joDetails;
    }

    function getById($id)
    {
        $joDetail = JoDetail::findOrFail($id);
        return $joDetail;
    }

    function create(JoDetailRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $joDetail = JoDetail::create($validatedData);
        return $joDetail;
    }

    function update(JoDetailRequest $request, $id)
    {
        $joDetail = JoDetail::findOrFail($id);
        $validatedData = $request->validated();
        $joDetail->update($validatedData);

        return $joDetail;
    }

    function delete($id)
    {
        $joDetail = JoDetail::findOrFail($id);
        $joDetail->delete();

        return $joDetail;
    }
}
