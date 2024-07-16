<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePrsRequest;
use App\Http\Requests\PrsRequest;
use App\Http\Requests\UpdatePrsRequest;
use App\Models\Prs;
use App\Repositories\IPrsRepository;
use App\Response;
use Illuminate\Http\Request;

class PrsController extends Controller
{
    private IPrsRepository $prsRepository;

    public function __construct(IPrsRepository $prsRepository)
    {
        $this->prsRepository = $prsRepository;
    }

    public function index()
    {
        $prs = $this->prsRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_PRS,
            'count' => Prs::count(),
            'data' => $prs,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $prs = $this->prsRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_PRS,
            'data' => $prs,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(PrsRequest $request)
    {
        $prs = $this->prsRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_PRS,
            'data' => $prs,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(Request $request, $id)
    {
        $prs = $this->prsRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_PRS,
            'data' => $prs,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->prsRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_PRS,
        ];

        return response()->json($response, $response['code']);
    }
}
