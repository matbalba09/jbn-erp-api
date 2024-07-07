<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePaymentRequest;
use App\Http\Requests\PaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Payment;
use App\Repositories\Interface\IPaymentRepository;
use App\Response;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private IPaymentRepository $paymentRepository;

    public function __construct(IPaymentRepository $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    public function index()
    {
        $payments = $this->paymentRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_PAYMENTS,
            'count' => Payment::count(),
            'data' => $payments,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $payment = $this->paymentRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_PAYMENT,
            'data' => $payment,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(PaymentRequest $request)
    {
        $payment = $this->paymentRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_PAYMENT,
            'data' => $payment,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(PaymentRequest $request, $id)
    {
        $payment = $this->paymentRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_PAYMENT,
            'data' => $payment,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->paymentRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_PAYMENT,
        ];

        return response()->json($response, $response['code']);
    }
}
