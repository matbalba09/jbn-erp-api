<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\JoRequest;
use App\Http\Requests\CreateJoRequest;
use App\Http\Requests\UpdateJoRequest;
use Carbon\Carbon;
use App\Models\Jo;
use App\Response;

interface IJoRepository
{
    function getAll();
    function getById($id);
    function create(JoRequest $request);
    function update(JoRequest $request, $id);
    function delete($id);
}

class JoRepository implements IJoRepository
{
    function getAll()
    {
        $jos = Jo::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $jos;
    }

    function getById($id)
    {
        $jo = Jo::findOrFail($id);
        return $jo;
    }

    function create(JoRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $jo = Jo::create($validatedData);
        return $jo;
    }

    function update(JoRequest $request, $id)
    {
        $jo = Jo::findOrFail($id);
        $validatedData = $request->validated();
        $jo->update($validatedData);

        return $jo;
    }

    function delete($id)
    {
        $jo = Jo::findOrFail($id);
        $jo->delete();

        return $jo;
    }
}
