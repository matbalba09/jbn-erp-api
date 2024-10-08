<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\SalesSoRequest;
use App\Http\Requests\CreateSalesSoRequest;
use App\Http\Requests\UpdateSalesSoRequest;
use Carbon\Carbon;
use App\Models\SalesSo;
use App\Response;

interface ISalesSoRepository
{
    function getAll();
    function getById($id);
    function create(SalesSoRequest $request);
    function update(SalesSoRequest $request, $id);
    function delete($id);
}

class SalesSoRepository implements ISalesSoRepository
{
    function getAll()
    {
        $salesSos = SalesSo::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $salesSos;
    }

    function getById($id)
    {
        $salesSo = SalesSo::findOrFail($id);
        return $salesSo;
    }

    function create(SalesSoRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $salesSo = SalesSo::create($validatedData);
        return $salesSo;
    }

    function update(SalesSoRequest $request, $id)
    {
        $salesSo = SalesSo::findOrFail($id);
        $validatedData = $request->validated();
        $salesSo->update($validatedData);

        return $salesSo;
    }

    function delete($id)
    {
        $salesSo = SalesSo::findOrFail($id);
        $salesSo->delete();

        return $salesSo;
    }
}
