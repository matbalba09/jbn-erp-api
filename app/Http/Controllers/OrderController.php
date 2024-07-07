<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Repositories\Interface\IOrderRepository;
use App\Response;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private IOrderRepository $orderRepository;

    public function __construct(IOrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        $orders = $this->orderRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_ORDERS,
            'count' => Order::count(),
            'data' => $orders,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $order = $this->orderRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ORDER,
            'data' => $order,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(OrderRequest $request)
    {
        $order = $this->orderRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_ORDER,
            'data' => $order,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(OrderRequest $request, $id)
    {
        $order = $this->orderRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_ORDER,
            'data' => $order,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->orderRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_ORDER,
        ];

        return response()->json($response, $response['code']);
    }
}
