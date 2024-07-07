<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePrsSupplierRequest;
use App\Http\Requests\PrsSupplierRequest;
use App\Http\Requests\UpdatePrsSupplierRequest;
use App\Models\PrsSupplier;
use App\Repositories\Interface\IPrsSupplierRepository;
use App\Response;
use Illuminate\Http\Request;

class PrsSupplierController extends Controller
{
    private IPrsSupplierRepository $prsSupplierRepository;

    public function __construct(IPrsSupplierRepository $prsSupplierRepository)
    {
        $this->prsSupplierRepository = $prsSupplierRepository;
    }

    public function index()
    {
        $prsSuppliers = $this->prsSupplierRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_PRS_SUPPLIERS,
            'count' => PrsSupplier::count(),
            'data' => $prsSuppliers,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $prsSupplier = $this->prsSupplierRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_PRS_SUPPLIER,
            'data' => $prsSupplier,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(PrsSupplierRequest $request)
    {
        $prsSupplier = $this->prsSupplierRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_PRS_SUPPLIER,
            'data' => $prsSupplier,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(PrsSupplierRequest $request, $id)
    {
        $prsSupplier = $this->prsSupplierRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_PRS_SUPPLIER,
            'data' => $prsSupplier,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->prsSupplierRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_PRS_SUPPLIER,
        ];

        return response()->json($response, $response['code']);
    }
}
