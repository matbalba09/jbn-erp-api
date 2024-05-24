<?php

namespace App\Repositories;

use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Role;
use App\Repositories\Interface\IRoleRepository;
use App\Response;
use Carbon\Carbon;

class RoleRepository implements IRoleRepository
{

    function getAll()
    {
        $roles = Role::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $roles;
    }

    function getById($id)
    {
        $role = Role::findOrFail($id);
        return $role;
    }

    function create(CreateRoleRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;
        $role = Role::create($validatedData);
        return $role;
    }

    function update(UpdateRoleRequest $request, $id)
    {
        $role = Role::findOrFail($id);
        $validatedData = $request->validated();
        $role->update($validatedData);
        
        return $role;
    }
}
