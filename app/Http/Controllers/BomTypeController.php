<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\BomTypeRequest;
use App\Http\Requests\CreateBomTypeRequest;
use App\Http\Requests\UpdateBomTypeRequest;
use App\Models\BomType;
use App\Repositories\Interface\IBomTypeRepository;
use App\Response;
use Illuminate\Http\Request;

class BomTypeController extends Controller
{
    private IBomTypeRepository $bomTypeRepository;

    public function __construct(IBomTypeRepository $bomTypeRepository)
    {
        $this->bomTypeRepository = $bomTypeRepository;
    }

    public function index()
    {
        $bomTypes = $this->bomTypeRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_BOM_TYPES,
            'count' => BomType::count(),
            'data' => $bomTypes,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $bomType = $this->bomTypeRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_BOM_TYPE,
            'data' => $bomType,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(BomTypeRequest $request)
    {
        $bomType = $this->bomTypeRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_BOM_TYPE,
            'data' => $bomType,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(BomTypeRequest $request, $id)
    {
        $bomType = $this->bomTypeRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_BOM_TYPE,
            'data' => $bomType,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->bomTypeRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_BOM_TYPE,
        ];

        return response()->json($response, $response['code']);
    }
}
