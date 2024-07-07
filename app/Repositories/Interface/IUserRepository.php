<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;

interface IUserRepository
{
    function getAll();
    function getById($id);
    function create(UserRequest $request);
    function update(UserRequest $request, $id);

    function setUserRoles($user_id, $role_ids);
    function getUserRoles($id);
    function getByUsername($username);
}