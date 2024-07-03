<?php

namespace App\Repositories\Interface;

use App\Http\Requests\CreateBomTypeRequest;
use App\Http\Requests\UpdateBomTypeRequest;

interface IBomTypeRepository
{
    function getAll();
    function getById($id);
    function create(CreateBomTypeRequest $request);
    function update(UpdateBomTypeRequest $request, $id);
    function delete($id);
}