<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreateServiceTypeRequest;
use App\Http\Requests\ServiceTypeRequest;
use App\Http\Requests\UpdateServiceTypeRequest;
use Carbon\Carbon;
use App\Models\ServiceType;
use App\Repositories\Interface\IServiceTypeRepository;
use App\Response;

class ServiceTypeRepository implements IServiceTypeRepository
{
    function getAll()
    {
        $serviceTypes = ServiceType::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $serviceTypes;
    }

    function getById($id)
    {
        $serviceType = ServiceType::findOrFail($id);
        return $serviceType;
    }

    function create(ServiceTypeRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        $serviceType = ServiceType::create($validatedData);
        return $serviceType;
    }

    function update(ServiceTypeRequest $request, $id)
    {
        $serviceType = ServiceType::findOrFail($id);
        $validatedData = $request->validated();
        $serviceType->update($validatedData);

        return $serviceType;
    }

    function delete($id)
    {
        $serviceType = ServiceType::findOrFail($id);
        $serviceType->delete();

        return $serviceType;
    }
}
