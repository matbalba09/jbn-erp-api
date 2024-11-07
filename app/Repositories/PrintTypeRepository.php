<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\PrintTypeRequest;
use App\Http\Requests\CreatePrintTypeRequest;
use App\Http\Requests\UpdatePrintTypeRequest;
use Carbon\Carbon;
use App\Models\PrintType;
use App\Response;

interface IPrintTypeRepository
{
    function getAll();
    function getById($id);
    function create(PrintTypeRequest $request);
    function update(PrintTypeRequest $request, $id);
    function delete($id);

    function getByPrintSize(PrintTypeRequest $request);
}

class PrintTypeRepository implements IPrintTypeRepository
{
    function getAll()
    {
        $printTypes = PrintType::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $printTypes;
    }

    function getById($id)
    {
        $printType = PrintType::findOrFail($id);
        return $printType;
    }

    function create(PrintTypeRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $printType = PrintType::create($validatedData);
        return $printType;
    }

    function update(PrintTypeRequest $request, $id)
    {
        $printType = PrintType::findOrFail($id);
        $validatedData = $request->validated();
        $printType->update($validatedData);

        return $printType;
    }

    function delete($id)
    {
        $printType = PrintType::findOrFail($id);
        $printType->delete();

        return $printType;
    }

    function getByPrintSize(PrintTypeRequest $request)
    {
        $validatedData = $request->validated();

        $printType = PrintType::where('print', $validatedData['print'])
            ->where('size', $validatedData['size'])
            ->first();

        if ($printType != null) {
            return $printType;
        } else {
            return null;
        }
    }
}
