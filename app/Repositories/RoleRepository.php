<?php

namespace App\Repositories;

use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\RoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Role;
use App\Response;
use Carbon\Carbon;

interface IRoleRepository
{
    function getAll();
    function getById($id);
    function create(RoleRequest $request);
    function update(RoleRequest $request, $id);
}

class RoleRepository implements IRoleRepository
{

    function getAll()
    {
        $roles = Role::where('is_deleted', Response::FALSE)->orderBy('created_at', 'asc')->get();
        return $roles;
    }

    function getById($id)
    {
        $role = Role::findOrFail($id);
        return $role;
    }

    function create(RoleRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;
        $role = Role::create($validatedData);
        return $role;
    }

    function update(RoleRequest $request, $id)
    {
        $role = Role::findOrFail($id);
        $validatedData = $request->validated();
        $role->update($validatedData);
        
        return $role;
    }
}
