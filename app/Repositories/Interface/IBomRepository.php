<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreateBomRequest;
use App\Http\Requests\UpdateBomRequest;

interface IBomRepository
{
    function getAll();
    function getById($id);
    function create(CreateBomRequest $request);
    function update(UpdateBomRequest $request, $id);
    function delete($id);
}