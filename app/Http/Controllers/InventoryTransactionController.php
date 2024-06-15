<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateInventoryTransactionRequest;
use App\Http\Requests\UpdateInventoryTransactionRequest;
use App\Models\InventoryTransaction;
use App\Repositories\Interface\IInventoryTransactionRepository;
use App\Response;
use Illuminate\Http\Request;

class InventoryTransactionController extends Controller
{
    private IInventoryTransactionRepository $inventoryTransactionRepository;

    public function __construct(IInventoryTransactionRepository $inventoryTransactionRepository)
    {
        $this->inventoryTransactionRepository = $inventoryTransactionRepository;
    }

    public function index()
    {
        $inventoryTransactions = $this->inventoryTransactionRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_INVENTORY_TRANSACTIONS,
            'count' => InventoryTransaction::count(),
            'data' => $inventoryTransactions,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $inventoryTransaction = $this->inventoryTransactionRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_INVENTORY_TRANSACTION,
            'data' => $inventoryTransaction,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(CreateInventoryTransactionRequest $request)
    {
        $inventoryTransaction = $this->inventoryTransactionRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_INVENTORY_TRANSACTION,
            'data' => $inventoryTransaction,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(UpdateInventoryTransactionRequest $request, $id)
    {
        $inventoryTransaction = $this->inventoryTransactionRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_INVENTORY_TRANSACTION,
            'data' => $inventoryTransaction,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->inventoryTransactionRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_INVENTORY_TRANSACTION,
        ];

        return response()->json($response, $response['code']);
    }
}
