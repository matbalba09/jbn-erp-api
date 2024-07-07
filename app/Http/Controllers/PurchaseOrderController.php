<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePurchaseOrderRequest;
use App\Http\Requests\PurchaseOrderRequest;
use App\Http\Requests\UpdatePurchaseOrderRequest;
use App\Models\PurchaseOrder;
use App\Repositories\IPurchaseOrderRepository;
use App\Response;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    private IPurchaseOrderRepository $purchaseOrderRepository;

    public function __construct(IPurchaseOrderRepository $purchaseOrderRepository)
    {
        $this->purchaseOrderRepository = $purchaseOrderRepository;
    }

    public function index()
    {
        $purchaseOrders = $this->purchaseOrderRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_PURCHASE_ORDERS,
            'count' => PurchaseOrder::count(),
            'data' => $purchaseOrders,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $purchaseOrder = $this->purchaseOrderRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_PURCHASE_ORDER,
            'data' => $purchaseOrder,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(PurchaseOrderRequest $request)
    {
        $purchaseOrder = $this->purchaseOrderRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_PURCHASE_ORDER,
            'data' => $purchaseOrder,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(PurchaseOrderRequest $request, $id)
    {
        $purchaseOrder = $this->purchaseOrderRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_PURCHASE_ORDER,
            'data' => $purchaseOrder,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->purchaseOrderRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_PURCHASE_ORDER,
        ];

        return response()->json($response, $response['code']);
    }
}
