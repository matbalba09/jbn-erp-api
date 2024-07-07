<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateQuotationRequest;
use App\Http\Requests\QuotationRequest;
use App\Http\Requests\UpdateQuotationRequest;
use App\Models\Quotation;
use App\Repositories\IQuotationRepository;
use App\Response;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    private IQuotationRepository $quotationRepository;

    public function __construct(IQuotationRepository $quotationRepository)
    {
        $this->quotationRepository = $quotationRepository;
    }

    public function index()
    {
        $quotations = $this->quotationRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_QUOTATIONS,
            'count' => Quotation::count(),
            'data' => $quotations,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $quotation = $this->quotationRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_QUOTATION,
            'data' => $quotation,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(QuotationRequest $request)
    {
        $quotation = $this->quotationRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_QUOTATION,
            'data' => $quotation,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(QuotationRequest $request, $id)
    {
        $quotation = $this->quotationRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_QUOTATION,
            'data' => $quotation,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->quotationRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_QUOTATION,
        ];

        return response()->json($response, $response['code']);
    }
}
