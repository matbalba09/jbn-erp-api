<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePurchaseRequisitionDetailRequest;
use App\Http\Requests\PurchaseRequisitionDetailRequest;
use App\Http\Requests\UpdatePurchaseRequisitionDetailRequest;
use App\Models\PurchaseRequisitionDetail;
use App\Repositories\Interface\IPurchaseRequisitionDetailRepository;
use App\Response;
use Illuminate\Http\Request;

class PurchaseRequisitionDetailController extends Controller
{
    private IPurchaseRequisitionDetailRepository $purchaseRequisitionDetailRepository;

    public function __construct(IPurchaseRequisitionDetailRepository $purchaseRequisitionDetailRepository)
    {
        $this->purchaseRequisitionDetailRepository = $purchaseRequisitionDetailRepository;
    }

    public function index()
    {
        $purchaseRequisitionDetails = $this->purchaseRequisitionDetailRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_PURCHASE_REQUISITION_DETAILS,
            'count' => PurchaseRequisitionDetail::count(),
            'data' => $purchaseRequisitionDetails,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $purchaseRequisitionDetail = $this->purchaseRequisitionDetailRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_PURCHASE_REQUISITION_DETAIL,
            'data' => $purchaseRequisitionDetail,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(PurchaseRequisitionDetailRequest $request)
    {
        $purchaseRequisitionDetail = $this->purchaseRequisitionDetailRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_PURCHASE_REQUISITION_DETAIL,
            'data' => $purchaseRequisitionDetail,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(PurchaseRequisitionDetailRequest $request, $id)
    {
        $purchaseRequisitionDetail = $this->purchaseRequisitionDetailRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_PURCHASE_REQUISITION_DETAIL,
            'data' => $purchaseRequisitionDetail,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->purchaseRequisitionDetailRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_PURCHASE_REQUISITION_DETAIL,
        ];

        return response()->json($response, $response['code']);
    }
}
