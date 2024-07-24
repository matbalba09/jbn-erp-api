<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PoRequest;
use App\Models\Po;
use App\Repositories\IPoRepository;
use App\Response;
use Illuminate\Http\Request;

class PoController extends Controller
{
    private IPoRepository $poRepository;

    public function __construct(IPoRepository $poRepository)
    {
        $this->poRepository = $poRepository;
    }

    public function index()
    {
        $po = $this->poRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_PO,
            'count' => Po::count(),
            'data' => $po,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $po = $this->poRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_PO,
            'data' => $po,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(PoRequest $request)
    {
        $po = $this->poRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_PO,
            'data' => $po,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(PoRequest $request, $id)
    {
        $po = $this->poRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_PO,
            'data' => $po,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->poRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_PO,
        ];

        return response()->json($response, $response['code']);
    }
}
