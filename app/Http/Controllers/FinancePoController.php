<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\FinancePoRequest;
use App\Http\Requests\CreateFinancePoRequest;
use App\Http\Requests\UpdateFinancePoRequest;
use App\Models\FinancePo;
use App\Repositories\IFinancePoRepository;
use App\Response;
use Illuminate\Http\Request;

class FinancePoController extends Controller
{
    private IFinancePoRepository $financePoRepository;

    public function __construct(IFinancePoRepository $financePoRepository)
    {
        $this->financePoRepository = $financePoRepository;
    }

    public function index()
    {
        $financePos = $this->financePoRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_FINANCE_PO,
            'count' => FinancePo::count(),
            'data' => $financePos,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $financePo = $this->financePoRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_FINANCE_PO,
            'data' => $financePo,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(FinancePoRequest $request)
    {
        $financePo = $this->financePoRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_FINANCE_PO,
            'data' => $financePo,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(FinancePoRequest $request, $id)
    {
        $financePo = $this->financePoRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_FINANCE_PO,
            'data' => $financePo,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->financePoRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_FINANCE_PO,
        ];

        return response()->json($response, $response['code']);
    }
}
