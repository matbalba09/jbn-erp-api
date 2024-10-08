<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductionDetailRequest;
use App\Http\Requests\CreateProductionDetailRequest;
use App\Http\Requests\UpdateProductionDetailRequest;
use App\Models\ProductionDetail;
use App\Repositories\IProductionDetailRepository;
use App\Response;
use Illuminate\Http\Request;

class ProductionDetailController extends Controller
{
    private IProductionDetailRepository $productionDetailRepository;

    public function __construct(IProductionDetailRepository $productionDetailRepository)
    {
        $this->productionDetailRepository = $productionDetailRepository;
    }

    public function index()
    {
        $productionDetails = $this->productionDetailRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_PRODUCTION_DETAILS,
            'count' => ProductionDetail::count(),
            'data' => $productionDetails,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $productionDetail = $this->productionDetailRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_PRODUCTION_DETAIL,
            'data' => $productionDetail,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(ProductionDetailRequest $request)
    {
        $productionDetail = $this->productionDetailRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_PRODUCTION_DETAIL,
            'data' => $productionDetail,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(ProductionDetailRequest $request, $id)
    {
        $productionDetail = $this->productionDetailRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_PRODUCTION_DETAIL,
            'data' => $productionDetail,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->productionDetailRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_PRODUCTION_DETAIL,
        ];

        return response()->json($response, $response['code']);
    }
}
