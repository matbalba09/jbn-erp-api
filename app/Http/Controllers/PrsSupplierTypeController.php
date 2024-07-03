<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePrsSupplierTypeRequest;
use App\Http\Requests\UpdatePrsSupplierTypeRequest;
use App\Models\PrsSupplierType;
use App\Repositories\Interface\IPrsSupplierTypeRepository;
use App\Response;
use Illuminate\Http\Request;

class PrsSupplierTypeController extends Controller
{
    private IPrsSupplierTypeRepository $prsSupplierTypeRepository;

    public function __construct(IPrsSupplierTypeRepository $prsSupplierTypeRepository)
    {
        $this->prsSupplierTypeRepository = $prsSupplierTypeRepository;
    }

    public function index()
    {
        $prsSupplierTypes = $this->prsSupplierTypeRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_PRS_SUPPLIER_TYPES,
            'count' => PrsSupplierType::count(),
            'data' => $prsSupplierTypes,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $prsSupplierType = $this->prsSupplierTypeRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_PRS_SUPPLIER_TYPE,
            'data' => $prsSupplierType,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(CreatePrsSupplierTypeRequest $request)
    {
        $prsSupplierType = $this->prsSupplierTypeRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_PRS_SUPPLIER_TYPE,
            'data' => $prsSupplierType,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(UpdatePrsSupplierTypeRequest $request, $id)
    {
        $prsSupplierType = $this->prsSupplierTypeRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_PRS_SUPPLIER_TYPE,
            'data' => $prsSupplierType,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->prsSupplierTypeRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_PRS_SUPPLIER_TYPE,
        ];

        return response()->json($response, $response['code']);
    }
}
