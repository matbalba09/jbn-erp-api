<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateQuotationDetailRequest;
use App\Http\Requests\QuotationDetailRequest;
use App\Http\Requests\UpdateQuotationDetailRequest;
use App\Models\QuotationDetail;
use App\Repositories\IQuotationDetailRepository;
use App\Response;
use Illuminate\Http\Request;

class QuotationDetailController extends Controller
{
    private IQuotationDetailRepository $quotationDetailRepository;

    public function __construct(IQuotationDetailRepository $quotationDetailRepository)
    {
        $this->quotationDetailRepository = $quotationDetailRepository;
    }

    public function index()
    {
        $quotationDetails = $this->quotationDetailRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_QUOTATION_DETAILS,
            'count' => QuotationDetail::count(),
            'data' => $quotationDetails,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $quotationDetail = $this->quotationDetailRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_QUOTATION_DETAIL,
            'data' => $quotationDetail,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(QuotationDetailRequest $request)
    {
        $quotationDetail = $this->quotationDetailRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_QUOTATION_DETAIL,
            'data' => $quotationDetail,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(QuotationDetailRequest $request, $id)
    {
        $quotationDetail = $this->quotationDetailRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_QUOTATION_DETAIL,
            'data' => $quotationDetail,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->quotationDetailRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_QUOTATION_DETAIL,
        ];

        return response()->json($response, $response['code']);
    }
}
