<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PrintTypeRequest;
use App\Http\Requests\CreatePrintTypeRequest;
use App\Http\Requests\UpdatePrintTypeRequest;
use App\Models\PrintType;
use App\Repositories\IPrintTypeRepository;
use App\Response;
use Illuminate\Http\Request;

class PrintTypeController extends Controller
{
    private IPrintTypeRepository $printTypeRepository;

    public function __construct(IPrintTypeRepository $printTypeRepository)
    {
        $this->printTypeRepository = $printTypeRepository;
    }

    public function index()
    {
        $printTypes = $this->printTypeRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_PRINT_TYPES,
            'count' => PrintType::count(),
            'data' => $printTypes,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $printType = $this->printTypeRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_PRINT_TYPE,
            'data' => $printType,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(PrintTypeRequest $request)
    {
        $printType = $this->printTypeRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_PRINT_TYPE,
            'data' => $printType,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(PrintTypeRequest $request, $id)
    {
        $printType = $this->printTypeRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_PRINT_TYPE,
            'data' => $printType,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->printTypeRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_PRINT_TYPE,
        ];

        return response()->json($response, $response['code']);
    }

    public function getByPrintSize(PrintTypeRequest $request)
    {
        $printType = $this->printTypeRepository->getByPrintSize($request);

        if ($printType != null) {
            $response = [
                'code' => Response::HTTP_SUCCESS,
                'status' => Response::SUCCESS,
                'message' => Response::SUCCESSFULLY_GET_PRINT_TYPE,
                'data' => $printType,
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
