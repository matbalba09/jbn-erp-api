<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\FinanceSoRequest;
use App\Http\Requests\CreateFinanceSoRequest;
use App\Http\Requests\UpdateFinanceSoRequest;
use App\Models\FinanceSo;
use App\Repositories\IFinanceSoRepository;
use App\Response;
use Illuminate\Http\Request;

class FinanceSoController extends Controller
{
    private IFinanceSoRepository $financeSoRepository;

    public function __construct(IFinanceSoRepository $financeSoRepository)
    {
        $this->financeSoRepository = $financeSoRepository;
    }

    public function index()
    {
        $financeSos = $this->financeSoRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_FINANCE_SO,
            'count' => FinanceSo::count(),
            'data' => $financeSos,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $financeSo = $this->financeSoRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_FINANCE_SO,
            'data' => $financeSo,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(FinanceSoRequest $request)
    {
        $financeSo = $this->financeSoRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_FINANCE_SO,
            'data' => $financeSo,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(FinanceSoRequest $request, $id)
    {
        $financeSo = $this->financeSoRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_FINANCE_SO,
            'data' => $financeSo,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->financeSoRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_FINANCE_SO,
        ];

        return response()->json($response, $response['code']);
    }
}
