<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreateServiceTypeRequest;
use App\Http\Requests\UpdateServiceTypeRequest;
use Carbon\Carbon;
use App\Models\ServiceType;
use App\Repositories\Interface\IServiceTypeRepository;
use App\Response;

class ServiceTypeRepository implements IServiceTypeRepository
{
    function getAll()
    {
        $serviceTypes = ServiceType::get();
        return $serviceTypes;
    }

    function getById($id)
    {
        $serviceType = ServiceType::findOrFail($id);
        return $serviceType;
    }

    function create(CreateServiceTypeRequest $request)
    {
        $validatedData = $request->validated();

        $serviceType = ServiceType::create($validatedData);
        return $serviceType;
    }

    function update(UpdateServiceTypeRequest $request, $id)
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
