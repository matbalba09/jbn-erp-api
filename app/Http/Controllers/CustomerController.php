<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use App\Repositories\Interface\ICustomerRepository;
use App\Response;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private ICustomerRepository $customerRepository;

    public function __construct(ICustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function index()
    {
        $customers = $this->customerRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_CUSTOMERS,
            'count' => Customer::count(),
            'data' => $customers,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $customer = $this->customerRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_CUSTOMER,
            'data' => $customer,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(CreateCustomerRequest $request)
    {
        $customer = $this->customerRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_CUSTOMER,
            'data' => $customer,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(UpdateCustomerRequest $request, $id)
    {
        $customer = $this->customerRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_CUSTOMER,
            'data' => $customer,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->customerRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_CUSTOMER,
        ];

        return response()->json($response, $response['code']);
    }
}
