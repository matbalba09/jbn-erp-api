<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBomRequest;
use App\Http\Requests\UpdateBomRequest;
use App\Models\Bom;
use App\Repositories\Interface\IBomRepository;
use App\Response;
use Illuminate\Http\Request;

class BomController extends Controller
{
    private IBomRepository $bomRepository;

    public function __construct(IBomRepository $bomRepository)
    {
        $this->bomRepository = $bomRepository;
    }

    public function index()
    {
        $boms = $this->bomRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_BOM,
            'count' => Bom::count(),
            'data' => $boms,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $bom = $this->bomRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_BOM,
            'data' => $bom,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(CreateBomRequest $request)
    {
        $bom = $this->bomRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_BOM,
            'data' => $bom,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(UpdateBomRequest $request, $id)
    {
        $bom = $this->bomRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_BOM,
            'data' => $bom,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->bomRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_BOM,
        ];

        return response()->json($response, $response['code']);
    }
}