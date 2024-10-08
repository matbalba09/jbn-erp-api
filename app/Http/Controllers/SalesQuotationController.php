<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalesQuotationRequest;
use App\Http\Requests\CreateSalesQuotationRequest;
use App\Http\Requests\UpdateSalesQuotationRequest;
use App\Models\SalesQuotation;
use App\Repositories\ISalesQuotationRepository;
use App\Response;
use Illuminate\Http\Request;

class SalesQuotationController extends Controller
{
    private ISalesQuotationRepository $salesQuotationRepository;

    public function __construct(ISalesQuotationRepository $salesQuotationRepository)
    {
        $this->salesQuotationRepository = $salesQuotationRepository;
    }

    public function index()
    {
        $salesQuotations = $this->salesQuotationRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_SALES_QUOTATIONS,
            'count' => SalesQuotation::count(),
            'data' => $salesQuotations,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $salesQuotation = $this->salesQuotationRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_SALES_QUOTATION,
            'data' => $salesQuotation,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(SalesQuotationRequest $request)
    {
        $salesQuotation = $this->salesQuotationRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_SALES_QUOTATION,
            'data' => $salesQuotation,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(SalesQuotationRequest $request, $id)
    {
        $salesQuotation = $this->salesQuotationRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_SALES_QUOTATION,
            'data' => $salesQuotation,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->salesQuotationRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_SALES_QUOTATION,
        ];

        return response()->json($response, $response['code']);
    }
}
