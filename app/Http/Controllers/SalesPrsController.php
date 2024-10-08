<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalesPrsRequest;
use App\Http\Requests\CreateSalesPrsRequest;
use App\Http\Requests\UpdateSalesPrsRequest;
use App\Models\SalesPrs;
use App\Repositories\ISalesPrsRepository;
use App\Response;
use Illuminate\Http\Request;

class SalesPrsController extends Controller
{
    private ISalesPrsRepository $salesPrsRepository;

    public function __construct(ISalesPrsRepository $salesPrsRepository)
    {
        $this->salesPrsRepository = $salesPrsRepository;
    }

    public function index()
    {
        $salesPrs = $this->salesPrsRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_SALES_PRS,
            'count' => SalesPrs::count(),
            'data' => $salesPrs,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $salesPrs = $this->salesPrsRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_SALES_PRS,
            'data' => $salesPrs,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(SalesPrsRequest $request)
    {
        $salesPrs = $this->salesPrsRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_SALES_PRS,
            'data' => $salesPrs,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(SalesPrsRequest $request, $id)
    {
        $salesPrs = $this->salesPrsRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_SALES_PRS,
            'data' => $salesPrs,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->salesPrsRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_SALES_PRS,
        ];

        return response()->json($response, $response['code']);
    }
}
