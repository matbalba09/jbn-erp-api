<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\ItemRequisitionRequest;
use App\Http\Requests\CreateItemRequisitionRequest;
use App\Http\Requests\UpdateItemRequisitionRequest;
use Carbon\Carbon;
use App\Models\ItemRequisition;
use App\Response;

interface IItemRequisitionRepository
{
    function getAll();
    function getById($id);
    function create(ItemRequisitionRequest $request);
    function update(ItemRequisitionRequest $request, $id);
    function delete($id);
}

class ItemRequisitionRepository implements IItemRequisitionRepository
{
    function getAll()
    {
        $itemRequisitions = ItemRequisition::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $itemRequisitions;
    }

    function getById($id)
    {
        $itemRequisition = ItemRequisition::findOrFail($id);
        return $itemRequisition;
    }

    function create(ItemRequisitionRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $itemRequisition = ItemRequisition::create($validatedData);
        return $itemRequisition;
    }

    function update(ItemRequisitionRequest $request, $id)
    {
        $itemRequisition = ItemRequisition::findOrFail($id);
        $validatedData = $request->validated();
        $itemRequisition->update($validatedData);

        return $itemRequisition;
    }

    function delete($id)
    {
        $itemRequisition = ItemRequisition::findOrFail($id);
        $itemRequisition->delete();

        return $itemRequisition;
    }
}
