<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\QualityPoRequest;
use App\Http\Requests\CreateQualityPoRequest;
use App\Http\Requests\UpdateQualityPoRequest;
use Carbon\Carbon;
use App\Models\QualityPo;
use App\Response;

interface IQualityPoRepository
{
    function getAll();
    function getById($id);
    function create(QualityPoRequest $request);
    function update(QualityPoRequest $request, $id);
    function delete($id);
}

class QualityPoRepository implements IQualityPoRepository
{
    function getAll()
    {
        $qualityPos = QualityPo::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $qualityPos;
    }

    function getById($id)
    {
        $qualityPo = QualityPo::findOrFail($id);
        return $qualityPo;
    }

    function create(QualityPoRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $qualityPo = QualityPo::create($validatedData);
        return $qualityPo;
    }

    function update(QualityPoRequest $request, $id)
    {
        $qualityPo = QualityPo::findOrFail($id);
        $validatedData = $request->validated();
        $qualityPo->update($validatedData);

        return $qualityPo;
    }

    function delete($id)
    {
        $qualityPo = QualityPo::findOrFail($id);
        $qualityPo->delete();

        return $qualityPo;
    }
}
