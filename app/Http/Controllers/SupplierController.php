<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Models\Supplier;
use App\Repositories\Interface\ISupplierRepository;
use App\Response;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    private ISupplierRepository $supplierRepository;

    public function __construct(ISupplierRepository $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
    }

    public function index()
    {
        $suppliers = $this->supplierRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_SUPPLIERS,
            'count' => Supplier::count(),
            'data' => $suppliers,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $supplier = $this->supplierRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_SUPPLIER,
            'data' => $supplier,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(CreateSupplierRequest $request)
    {
        $supplier = $this->supplierRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_SUPPLIER,
            'data' => $supplier,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(UpdateSupplierRequest $request, $id)
    {
        $supplier = $this->supplierRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_SUPPLIER,
            'data' => $supplier,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->supplierRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_SUPPLIER,
        ];

        return response()->json($response, $response['code']);
    }
}
