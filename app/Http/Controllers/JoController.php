<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\JoRequest;
use App\Http\Requests\CreateJoRequest;
use App\Http\Requests\UpdateJoRequest;
use App\Models\Jo;
use App\Repositories\IJoRepository;
use App\Response;
use Illuminate\Http\Request;

class JoController extends Controller
{
    private IJoRepository $joRepository;

    public function __construct(IJoRepository $joRepository)
    {
        $this->joRepository = $joRepository;
    }

    public function index()
    {
        $jos = $this->joRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_JO,
            'count' => Jo::count(),
            'data' => $jos,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $jo = $this->joRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_JO,
            'data' => $jo,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(JoRequest $request)
    {
        $jo = $this->joRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_JO,
            'data' => $jo,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(JoRequest $request, $id)
    {
        $jo = $this->joRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_JO,
            'data' => $jo,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->joRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_JO,
        ];

        return response()->json($response, $response['code']);
    }
}
