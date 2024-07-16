<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePrsDetailRequest;
use App\Http\Requests\PrsDetailRequest;
use App\Http\Requests\UpdatePrsDetailRequest;
use App\Models\PrsDetail;
use App\Repositories\IPrsDetailRepository;
use App\Response;
use Illuminate\Http\Request;

class PrsDetailController extends Controller
{
    private IPrsDetailRepository $prsDetailRepository;

    public function __construct(IPrsDetailRepository $prsDetailRepository)
    {
        $this->prsDetailRepository = $prsDetailRepository;
    }

    public function index()
    {
        $prsDetails = $this->prsDetailRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_PRS_DETAILS,
            'count' => PrsDetail::count(),
            'data' => $prsDetails,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $prsDetail = $this->prsDetailRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_PRS_DETAIL,
            'data' => $prsDetail,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(PrsDetailRequest $request)
    {
        $prsDetail = $this->prsDetailRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_PRS_DETAIL,
            'data' => $prsDetail,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(PrsDetailRequest $request, $id)
    {
        $prsDetail = $this->prsDetailRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_PRS_DETAIL,
            'data' => $prsDetail,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->prsDetailRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_PRS_DETAIL,
        ];

        return response()->json($response, $response['code']);
    }
}
