<?php

namespace App\Repositories;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Repositories\Interface\IUserRepository;
use App\Response;
use Carbon\Carbon;

class UserRepository implements IUserRepository
{

    function getAll()
    {
        $users = User::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $users;
    }

    function getById($id)
    {
        $user = User::findOrFail($id);
        return $user;
    }

    function create(CreateUserRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;
        $user = User::create($validatedData);
        return $user;
    }

    function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $validatedData = $request->validated();
        $user->update($validatedData);

        return $user;
    }

    // function setUserRole($user_id, $role_id)
    // {
    //     $user = User::findOrFail($user_id);
    //     $role = Role::findOrFail($role_id);

    //     $user->roles()->attach($role);

    //     return $user;
    // }

    function getUserRoles($id)
    {
        $user = User::findOrFail($id);

        $user->roles->each(function ($role) {
            $role->setHidden(['pivot']);
        });

        return $user;
    }

    function setUserRoles($id, $role_ids)
    {
        $user = User::findOrFail($id);
        $roles = Role::whereIn('id', $role_ids)->get();
        
        $user->roles()->sync($roles);
        $user->roles->each(function ($role) {
            $role->setHidden(['pivot']);
        });

        return $user;
    }
}
