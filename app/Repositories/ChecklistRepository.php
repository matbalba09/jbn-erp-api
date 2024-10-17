<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\ChecklistRequest;
use App\Http\Requests\CreateChecklistRequest;
use App\Http\Requests\UpdateChecklistRequest;
use Carbon\Carbon;
use App\Models\Checklist;
use App\Response;

interface IChecklistRepository
{
    function getAll();
    function getById($id);
    function create(ChecklistRequest $request);
    function update(ChecklistRequest $request, $id);
    function delete($id);
}

class ChecklistRepository implements IChecklistRepository
{
    function getAll()
    {
        $checklists = Checklist::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $checklists;
    }

    function getById($id)
    {
        $checklist = Checklist::findOrFail($id);
        return $checklist;
    }

    function create(ChecklistRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $checklist = Checklist::create($validatedData);
        return $checklist;
    }

    function update(ChecklistRequest $request, $id)
    {
        $checklist = Checklist::findOrFail($id);
        $validatedData = $request->validated();
        $checklist->update($validatedData);

        return $checklist;
    }

    function delete($id)
    {
        $checklist = Checklist::findOrFail($id);
        $checklist->delete();

        return $checklist;
    }
}
