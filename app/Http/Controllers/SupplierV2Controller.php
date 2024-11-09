<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSupplierV2Request;
use App\Http\Requests\SupplierV2Request;
use App\Http\Requests\UpdateSupplierV2Request;
use App\Models\SupplierV2;
use App\Repositories\ISupplierV2Repository;
use App\Response;
use Illuminate\Http\Request;

class SupplierV2Controller extends Controller
{
    private ISupplierV2Repository $supplierV2Repository;

    public function __construct(ISupplierV2Repository $supplierV2Repository)
    {
        $this->supplierV2Repository = $supplierV2Repository;
    }

    public function index()
    {
        $supplierV2 = $this->supplierV2Repository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_SUPPLIERS,
            'count' => SupplierV2::count(),
            'data' => $supplierV2,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $supplierV2 = $this->supplierV2Repository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_SUPPLIER,
            'data' => $supplierV2,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(SupplierV2Request $request)
    {
        $supplierV2 = $this->supplierV2Repository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_SUPPLIER,
            'data' => $supplierV2,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(SupplierV2Request $request, $id)
    {
        $supplierV2 = $this->supplierV2Repository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_SUPPLIER,
            'data' => $supplierV2,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->supplierV2Repository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_SUPPLIER,
        ];

        return response()->json($response, $response['code']);
    }
}
