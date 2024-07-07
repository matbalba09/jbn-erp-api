<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\RoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Role;
use App\Repositories\Interface\IRoleRepository;
use App\Response;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private IRoleRepository $roleRepository;

    public function __construct(IRoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        $roles = $this->roleRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_ROLES,
            'count' => Role::count(),
            'data' => $roles,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $role = $this->roleRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ROLE,
            'data' => $role,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(RoleRequest $request)
    {
        $role = $this->roleRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_ROLE,
            'data' => $role,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(RoleRequest $request, $id)
    {
        $role = $this->roleRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_ROLE,
            'data' => $role,
        ];

        return response()->json($response, $response['code']);
    }
}
