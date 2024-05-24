<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Repositories\Interface\IUserRepository;
use App\Response;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $user = $this->userRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_USERS,
            'count' => User::count(),
            'data' => $user,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $user = $this->userRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_USER,
            'data' => $user,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(CreateUserRequest $request)
    {
        $user = $this->userRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_USER,
            'data' => $user,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->userRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_USER,
            'data' => $user,
        ];

        return response()->json($response, $response['code']);
    }

    public function setUserRoles(Request $request)
    {
        $user_id = $request->input('user_id');
        $role_ids = $request->input('role_ids');

        $user = $this->userRepository->setUserRoles($user_id, $role_ids);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_SET_ROLE,
            'data' => $user,
        ];

        return response()->json($response, $response['code']);
    }

    public function getUserRoles($id)
    {
        $user = $this->userRepository->getUserRoles($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_USER_ROLES,
            'data' => $user,
        ];

        return response()->json($response, $response['code']);
    }
}
