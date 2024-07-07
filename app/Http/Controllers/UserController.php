<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repositories\IUserRepository;
use App\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(Request $request)
    {
        if ($request->has('username')) {
            $user = $this->userRepository->getByUsername($request->username);
            if ($user) {
                if (!Hash::check($request->password, $user->password)) {
                    $response = [
                        'code' => Response::HTTP_UNAUTHORIZED,
                        'status' => Response::FAIL,
                        'message' => Response::INVALID_CREDENTIAL,
                    ];
                } else {
                    $response = [
                        'code' => Response::HTTP_SUCCESS,
                        'status' => Response::SUCCESS,
                        'message' => Response::SUCCESSFULLY_LOGGED_IN,
                        'user' => $user
                    ];
                }
            } else {
                $response = [
                    'code' => Response::HTTP_NOT_FOUND,
                    'status' => Response::FAIL,
                    'message' => Response::USER_NOT_FOUND,
                ];
            }
        } else {
            $response = [
                'code' => Response::HTTP_NOT_PROCESSABLE,
                'status' => Response::FAIL,
                'message' => Response::INCORRECT_LOGIN_INPUT,
            ];
        }
        return response()->json($response, $response['code']);
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

    public function create(UserRequest $request)
    {
        $user = $this->userRepository->create($request);

        if (!$user) {
            $response = [
                'code' => Response::HTTP_SUCCESS,
                'status' => Response::FAIL,
                'message' => Response::FAILED_TO_CREATE_USER,
            ];
        } else {
            $response = [
                'code' => Response::HTTP_SUCCESS_POST,
                'status' => Response::SUCCESS,
                'message' => Response::SUCCESSFULLY_CREATED_USER,
                'data' => $user,
            ];
        }
        
        return response()->json($response, $response['code']);
    }

    public function update(UserRequest $request, $id)
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
