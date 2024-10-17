<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LaborCostRequest;
use App\Http\Requests\CreateLaborCostRequest;
use App\Http\Requests\UpdateLaborCostRequest;
use App\Models\LaborCost;
use App\Repositories\ILaborCostRepository;
use App\Response;
use Illuminate\Http\Request;

class LaborCostController extends Controller
{
    private ILaborCostRepository $laborCostRepository;

    public function __construct(ILaborCostRepository $laborCostRepository)
    {
        $this->laborCostRepository = $laborCostRepository;
    }

    public function index()
    {
        $laborCosts = $this->laborCostRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_LABOR_COSTS,
            'count' => LaborCost::count(),
            'data' => $laborCosts,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $laborCost = $this->laborCostRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_LABOR_COST,
            'data' => $laborCost,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(LaborCostRequest $request)
    {
        $laborCost = $this->laborCostRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_LABOR_COST,
            'data' => $laborCost,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(LaborCostRequest $request, $id)
    {
        $laborCost = $this->laborCostRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_LABOR_COST,
            'data' => $laborCost,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->laborCostRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_LABOR_COST,
        ];

        return response()->json($response, $response['code']);
    }
}
