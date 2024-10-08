<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\FinanceSoRequest;
use App\Http\Requests\CreateFinanceSoRequest;
use App\Http\Requests\UpdateFinanceSoRequest;
use Carbon\Carbon;
use App\Models\FinanceSo;
use App\Response;

interface IFinanceSoRepository
{
    function getAll();
    function getById($id);
    function create(FinanceSoRequest $request);
    function update(FinanceSoRequest $request, $id);
    function delete($id);
}

class FinanceSoRepository implements IFinanceSoRepository
{
    function getAll()
    {
        $financeSos = FinanceSo::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $financeSos;
    }

    function getById($id)
    {
        $financeSo = FinanceSo::findOrFail($id);
        return $financeSo;
    }

    function create(FinanceSoRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $financeSo = FinanceSo::create($validatedData);
        return $financeSo;
    }

    function update(FinanceSoRequest $request, $id)
    {
        $financeSo = FinanceSo::findOrFail($id);
        $validatedData = $request->validated();
        $financeSo->update($validatedData);

        return $financeSo;
    }

    function delete($id)
    {
        $financeSo = FinanceSo::findOrFail($id);
        $financeSo->delete();

        return $financeSo;
    }
}
