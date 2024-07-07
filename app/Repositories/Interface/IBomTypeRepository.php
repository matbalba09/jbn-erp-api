<?php

namespace App\Repositories\Interface;

use App\Http\Requests\BomTypeRequest;
use App\Http\Requests\CreateBomTypeRequest;
use App\Http\Requests\UpdateBomTypeRequest;

interface IBomTypeRepository
{
    function getAll();
    function getById($id);
    function create(BomTypeRequest $request);
    function update(BomTypeRequest $request, $id);
    function delete($id);
}