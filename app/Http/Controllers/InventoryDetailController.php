<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateInventoryDetailRequest;
use App\Http\Requests\UpdateInventoryDetailRequest;
use App\Models\InventoryDetail;
use App\Repositories\Interface\IInventoryDetailRepository;
use App\Response;
use Illuminate\Http\Request;

class InventoryDetailController extends Controller
{
    private IInventoryDetailRepository $inventoryDetailRepository;

    public function __construct(IInventoryDetailRepository $inventoryDetailRepository)
    {
        $this->inventoryDetailRepository = $inventoryDetailRepository;
    }

    public function index()
    {
        $inventoryDetails = $this->inventoryDetailRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_INVENTORY_DETAILS,
            'count' => InventoryDetail::count(),
            'data' => $inventoryDetails,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $inventoryDetail = $this->inventoryDetailRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_INVENTORY_DETAIL,
            'data' => $inventoryDetail,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(CreateInventoryDetailRequest $request)
    {
        $inventoryDetail = $this->inventoryDetailRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_INVENTORY_DETAIL,
            'data' => $inventoryDetail,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(UpdateInventoryDetailRequest $request, $id)
    {
        $inventoryDetail = $this->inventoryDetailRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_INVENTORY_DETAIL,
            'data' => $inventoryDetail,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->inventoryDetailRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_INVENTORY_DETAIL,
        ];

        return response()->json($response, $response['code']);
    }
}
