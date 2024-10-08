<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\FinancePoRequest;
use App\Http\Requests\CreateFinancePoRequest;
use App\Http\Requests\UpdateFinancePoRequest;
use Carbon\Carbon;
use App\Models\FinancePo;
use App\Response;

interface IFinancePoRepository
{
    function getAll();
    function getById($id);
    function create(FinancePoRequest $request);
    function update(FinancePoRequest $request, $id);
    function delete($id);
}

class FinancePoRepository implements IFinancePoRepository
{
    function getAll()
    {
        $financePos = FinancePo::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $financePos;
    }

    function getById($id)
    {
        $financePo = FinancePo::findOrFail($id);
        return $financePo;
    }

    function create(FinancePoRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $financePo = FinancePo::create($validatedData);
        return $financePo;
    }

    function update(FinancePoRequest $request, $id)
    {
        $financePo = FinancePo::findOrFail($id);
        $validatedData = $request->validated();
        $financePo->update($validatedData);

        return $financePo;
    }

    function delete($id)
    {
        $financePo = FinancePo::findOrFail($id);
        $financePo->delete();

        return $financePo;
    }
}
