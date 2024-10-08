<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\JoDetailRequest;
use App\Http\Requests\CreateJoDetailRequest;
use App\Http\Requests\UpdateJoDetailRequest;
use App\Models\JoDetail;
use App\Repositories\IJoDetailRepository;
use App\Response;
use Illuminate\Http\Request;

class JoDetailController extends Controller
{
    private IJoDetailRepository $joDetailRepository;

    public function __construct(IJoDetailRepository $joDetailRepository)
    {
        $this->joDetailRepository = $joDetailRepository;
    }

    public function index()
    {
        $joDetails = $this->joDetailRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_JO_DETAILS,
            'count' => JoDetail::count(),
            'data' => $joDetails,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $joDetail = $this->joDetailRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_JO_DETAIL,
            'data' => $joDetail,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(JoDetailRequest $request)
    {
        $joDetail = $this->joDetailRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_JO_DETAIL,
            'data' => $joDetail,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(JoDetailRequest $request, $id)
    {
        $joDetail = $this->joDetailRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_JO_DETAIL,
            'data' => $joDetail,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->joDetailRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_JO_DETAIL,
        ];

        return response()->json($response, $response['code']);
    }
}
