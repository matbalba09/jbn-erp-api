<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RawMaterialRequest;
use App\Http\Requests\CreateRawMaterialRequest;
use App\Http\Requests\UpdateRawMaterialRequest;
use App\Models\RawMaterial;
use App\Repositories\IRawMaterialRepository;
use App\Response;
use Illuminate\Http\Request;

class RawMaterialController extends Controller
{
    private IRawMaterialRepository $rawMaterialRepository;

    public function __construct(IRawMaterialRepository $rawMaterialRepository)
    {
        $this->rawMaterialRepository = $rawMaterialRepository;
    }

    public function index()
    {
        $rawMaterials = $this->rawMaterialRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_RAW_MATERIALS,
            'count' => RawMaterial::count(),
            'data' => $rawMaterials,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $rawMaterial = $this->rawMaterialRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_RAW_MATERIAL,
            'data' => $rawMaterial,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(RawMaterialRequest $request)
    {
        $rawMaterial = $this->rawMaterialRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_RAW_MATERIAL,
            'data' => $rawMaterial,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(RawMaterialRequest $request, $id)
    {
        $rawMaterial = $this->rawMaterialRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_RAW_MATERIAL,
            'data' => $rawMaterial,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->rawMaterialRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_RAW_MATERIAL,
        ];

        return response()->json($response, $response['code']);
    }

    public function getByMakerMaterialColorSize(RawMaterialRequest $request)
    {
        $rawMaterial = $this->rawMaterialRepository->getByMakerMaterialColorSize($request);

        if ($rawMaterial != null) {
            $response = [
                'code' => Response::HTTP_SUCCESS,
                'status' => Response::SUCCESS,
                'message' => Response::SUCCESSFULLY_GET_RAW_MATERIAL,
                'data' => $rawMaterial,
            ];
            return response()->json($response, $response['code']);
        } else {
            $response = [
                'code' => Response::HTTP_NOT_FOUND,
                'status' => Response::FAIL,
                'message' => Response::HTTP_NOT_FOUND,
            ];
            return response()->json($response, $response['code']);
        }
    }
}
