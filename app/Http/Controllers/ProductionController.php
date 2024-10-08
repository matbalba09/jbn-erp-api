<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductionRequest;
use App\Http\Requests\CreateProductionRequest;
use App\Http\Requests\UpdateProductionRequest;
use App\Models\Production;
use App\Repositories\IProductionRepository;
use App\Response;
use Illuminate\Http\Request;

class ProductionController extends Controller
{
    private IProductionRepository $productionRepository;

    public function __construct(IProductionRepository $productionRepository)
    {
        $this->productionRepository = $productionRepository;
    }

    public function index()
    {
        $productions = $this->productionRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_PRODUCTIONS,
            'count' => Production::count(),
            'data' => $productions,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $production = $this->productionRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_PRODUCTION,
            'data' => $production,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(ProductionRequest $request)
    {
        $production = $this->productionRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_PRODUCTION,
            'data' => $production,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(ProductionRequest $request, $id)
    {
        $production = $this->productionRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_PRODUCTION,
            'data' => $production,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->productionRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_PRODUCTION,
        ];

        return response()->json($response, $response['code']);
    }
}
