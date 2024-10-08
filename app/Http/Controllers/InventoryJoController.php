<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\InventoryJoRequest;
use App\Http\Requests\CreateInventoryJoRequest;
use App\Http\Requests\UpdateInventoryJoRequest;
use App\Models\InventoryJo;
use App\Repositories\IInventoryJoRepository;
use App\Response;
use Illuminate\Http\Request;

class InventoryJoController extends Controller
{
    private IInventoryJoRepository $inventoryJoRepository;

    public function __construct(IInventoryJoRepository $inventoryJoRepository)
    {
        $this->inventoryJoRepository = $inventoryJoRepository;
    }

    public function index()
    {
        $inventoryJos = $this->inventoryJoRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_INVENTORY_JO,
            'count' => InventoryJo::count(),
            'data' => $inventoryJos,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $inventoryJo = $this->inventoryJoRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_INVENTORY_JO,
            'data' => $inventoryJo,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(InventoryJoRequest $request)
    {
        $inventoryJo = $this->inventoryJoRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_INVENTORY_JO,
            'data' => $inventoryJo,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(InventoryJoRequest $request, $id)
    {
        $inventoryJo = $this->inventoryJoRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_INVENTORY_JO,
            'data' => $inventoryJo,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->inventoryJoRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_INVENTORY_JO,
        ];

        return response()->json($response, $response['code']);
    }
}
