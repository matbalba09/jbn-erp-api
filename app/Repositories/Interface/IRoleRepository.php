<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\RoleRequest;
use App\Http\Requests\UpdateRoleRequest;

interface IRoleRepository
{
    function getAll();
    function getById($id);
    function create(RoleRequest $request);
    function update(RoleRequest $request, $id);
}