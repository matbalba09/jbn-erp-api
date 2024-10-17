<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductLaborCostRequest;
use App\Http\Requests\CreateProductLaborCostRequest;
use App\Http\Requests\UpdateProductLaborCostRequest;
use App\Models\ProductLaborCost;
use App\Repositories\IProductLaborCostRepository;
use App\Response;
use Illuminate\Http\Request;

class ProductLaborCostController extends Controller
{
    private IProductLaborCostRepository $productLaborCostRepository;

    public function __construct(IProductLaborCostRepository $productLaborCostRepository)
    {
        $this->productLaborCostRepository = $productLaborCostRepository;
    }

    public function index()
    {
        $productLaborCosts = $this->productLaborCostRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_PRODUCT_LABOR_COSTS,
            'count' => ProductLaborCost::count(),
            'data' => $productLaborCosts,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $productLaborCost = $this->productLaborCostRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_PRODUCT_LABOR_COST,
            'data' => $productLaborCost,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(ProductLaborCostRequest $request)
    {
        $productLaborCost = $this->productLaborCostRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_PRODUCT_LABOR_COST,
            'data' => $productLaborCost,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(ProductLaborCostRequest $request, $id)
    {
        $productLaborCost = $this->productLaborCostRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_PRODUCT_LABOR_COST,
            'data' => $productLaborCost,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->productLaborCostRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_PRODUCT_LABOR_COST,
        ];

        return response()->json($response, $response['code']);
    }
}
