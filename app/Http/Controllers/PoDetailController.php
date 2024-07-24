<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PoDetailRequest;
use App\Models\PoDetail;
use App\Repositories\IPoDetailRepository;
use App\Response;
use Illuminate\Http\Request;

class PoDetailController extends Controller
{
    private IPoDetailRepository $poDetailRepository;

    public function __construct(IPoDetailRepository $poDetailRepository)
    {
        $this->poDetailRepository = $poDetailRepository;
    }

    public function index()
    {
        $poDetails = $this->poDetailRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_PO_DETAILS,
            'count' => PoDetail::count(),
            'data' => $poDetails,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $poDetail = $this->poDetailRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_PO_DETAIL,
            'data' => $poDetail,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(PoDetailRequest $request)
    {
        $poDetail = $this->poDetailRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_PO_DETAIL,
            'data' => $poDetail,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(PoDetailRequest $request, $id)
    {
        $poDetail = $this->poDetailRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_PO_DETAIL,
            'data' => $poDetail,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->poDetailRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_PO_DETAIL,
        ];

        return response()->json($response, $response['code']);
    }
}
