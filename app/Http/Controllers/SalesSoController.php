<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalesSoRequest;
use App\Http\Requests\CreateSalesSoRequest;
use App\Http\Requests\UpdateSalesSoRequest;
use App\Models\SalesSo;
use App\Repositories\ISalesSoRepository;
use App\Response;
use Illuminate\Http\Request;

class SalesSoController extends Controller
{
    private ISalesSoRepository $salesSoRepository;

    public function __construct(ISalesSoRepository $salesSoRepository)
    {
        $this->salesSoRepository = $salesSoRepository;
    }

    public function index()
    {
        $salesSos = $this->salesSoRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_SALES_SO,
            'count' => SalesSo::count(),
            'data' => $salesSos,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $salesSo = $this->salesSoRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_SALES_SO,
            'data' => $salesSo,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(SalesSoRequest $request)
    {
        $salesSo = $this->salesSoRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_SALES_SO,
            'data' => $salesSo,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(SalesSoRequest $request, $id)
    {
        $salesSo = $this->salesSoRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_SALES_SO,
            'data' => $salesSo,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->salesSoRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_SALES_SO,
        ];

        return response()->json($response, $response['code']);
    }
}
