<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrderDetailRequest;
use App\Http\Requests\OrderDetailRequest;
use App\Http\Requests\UpdateOrderDetailRequest;
use App\Models\OrderDetail;
use App\Repositories\IOrderDetailRepository;
use App\Response;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    private IOrderDetailRepository $orderDetailRepository;

    public function __construct(IOrderDetailRepository $orderDetailRepository)
    {
        $this->orderDetailRepository = $orderDetailRepository;
    }

    public function index()
    {
        $orderDetails = $this->orderDetailRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_ORDER_DETAILS,
            'count' => OrderDetail::count(),
            'data' => $orderDetails,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $orderDetail = $this->orderDetailRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ORDER_DETAIL,
            'data' => $orderDetail,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(OrderDetailRequest $request)
    {
        $orderDetail = $this->orderDetailRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_ORDER_DETAIL,
            'data' => $orderDetail,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(OrderDetailRequest $request, $id)
    {
        $orderDetail = $this->orderDetailRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_ORDER_DETAIL,
            'data' => $orderDetail,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->orderDetailRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_ORDER_DETAIL,
        ];

        return response()->json($response, $response['code']);
    }
}
