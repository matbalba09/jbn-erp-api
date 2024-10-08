<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\InventoryPoRequest;
use App\Http\Requests\CreateInventoryPoRequest;
use App\Http\Requests\UpdateInventoryPoRequest;
use App\Models\InventoryPo;
use App\Repositories\IInventoryPoRepository;
use App\Response;
use Illuminate\Http\Request;

class InventoryPoController extends Controller
{
    private IInventoryPoRepository $inventoryPoRepository;

    public function __construct(IInventoryPoRepository $inventoryPoRepository)
    {
        $this->inventoryPoRepository = $inventoryPoRepository;
    }

    public function index()
    {
        $inventoryPos = $this->inventoryPoRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_INVENTORY_PO,
            'count' => InventoryPo::count(),
            'data' => $inventoryPos,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $inventoryPo = $this->inventoryPoRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_INVENTORY_PO,
            'data' => $inventoryPo,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(InventoryPoRequest $request)
    {
        $inventoryPo = $this->inventoryPoRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_INVENTORY_PO,
            'data' => $inventoryPo,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(InventoryPoRequest $request, $id)
    {
        $inventoryPo = $this->inventoryPoRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_INVENTORY_PO,
            'data' => $inventoryPo,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->inventoryPoRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_INVENTORY_PO,
        ];

        return response()->json($response, $response['code']);
    }
}
