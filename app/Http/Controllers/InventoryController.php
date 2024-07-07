<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateInventoryRequest;
use App\Http\Requests\InventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;
use App\Models\Inventory;
use App\Repositories\Interface\IInventoryRepository;
use App\Response;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    private IInventoryRepository $inventoryRepository;

    public function __construct(IInventoryRepository $inventoryRepository)
    {
        $this->inventoryRepository = $inventoryRepository;
    }

    public function index()
    {
        $inventories = $this->inventoryRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_INVENTORIES,
            'count' => Inventory::count(),
            'data' => $inventories,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $inventory = $this->inventoryRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_INVENTORY,
            'data' => $inventory,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(InventoryRequest $request)
    {
        $inventory = $this->inventoryRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_INVENTORY,
            'data' => $inventory,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(InventoryRequest $request, $id)
    {
        $inventory = $this->inventoryRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_INVENTORY,
            'data' => $inventory,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->inventoryRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_INVENTORY,
        ];

        return response()->json($response, $response['code']);
    }
}
