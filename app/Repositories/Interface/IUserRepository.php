<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;

interface IUserRepository
{
    function getAll();
    function getById($id);
    function create(CreateUserRequest $request);
    function update(UpdateUserRequest $request, $id);

    function setUserRoles($user_id, $role_ids);
    function getUserRoles($id);
    function getByUsername($username);
}