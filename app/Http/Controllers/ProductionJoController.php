<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductionJoRequest;
use App\Http\Requests\CreateProductionJoRequest;
use App\Http\Requests\UpdateProductionJoRequest;
use App\Models\ProductionJo;
use App\Repositories\IProductionJoRepository;
use App\Response;
use Illuminate\Http\Request;

class ProductionJoController extends Controller
{
    private IProductionJoRepository $productionJoRepository;

    public function __construct(IProductionJoRepository $productionJoRepository)
    {
        $this->productionJoRepository = $productionJoRepository;
    }

    public function index()
    {
        $productionJos = $this->productionJoRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_PRODUCTION_JO,
            'count' => ProductionJo::count(),
            'data' => $productionJos,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $productionJo = $this->productionJoRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_PRODUCTION_JO,
            'data' => $productionJo,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(ProductionJoRequest $request)
    {
        $productionJo = $this->productionJoRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_PRODUCTION_JO,
            'data' => $productionJo,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(ProductionJoRequest $request, $id)
    {
        $productionJo = $this->productionJoRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_PRODUCTION_JO,
            'data' => $productionJo,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->productionJoRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_PRODUCTION_JO,
        ];

        return response()->json($response, $response['code']);
    }
}
