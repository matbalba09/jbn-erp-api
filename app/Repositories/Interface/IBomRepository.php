<?php

namespace App\Repositories\Interface;

use App\Http\Requests\BomRequest;
use App\Http\Requests\CreateBomRequest;
use App\Http\Requests\UpdateBomRequest;

interface IBomRepository
{
    function getAll();
    function getById($id);
    function create(BomRequest $request);
    function update(BomRequest $request, $id);
    function delete($id);
}