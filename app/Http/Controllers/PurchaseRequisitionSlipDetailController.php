<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePurchaseRequisitionSlipDetailRequest;
use App\Http\Requests\UpdatePurchaseRequisitionSlipDetailRequest;
use App\Models\PurchaseRequisitionSlipDetail;
use App\Repositories\Interface\IPurchaseRequisitionSlipDetailRepository;
use App\Response;
use Illuminate\Http\Request;

class PurchaseRequisitionSlipDetailController extends Controller
{
    private IPurchaseRequisitionSlipDetailRepository $purchaseRequisitionSlipDetailRepository;

    public function __construct(IPurchaseRequisitionSlipDetailRepository $purchaseRequisitionSlipDetailRepository)
    {
        $this->purchaseRequisitionSlipDetailRepository = $purchaseRequisitionSlipDetailRepository;
    }

    public function index()
    {
        $purchaseRequisitionSlipDetails = $this->purchaseRequisitionSlipDetailRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_PURCHASE_REQUISITION_SLIP_DETAILS,
            'count' => PurchaseRequisitionSlipDetail::count(),
            'data' => $purchaseRequisitionSlipDetails,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $purchaseRequisitionSlipDetail = $this->purchaseRequisitionSlipDetailRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_PURCHASE_REQUISITION_SLIP_DETAIL,
            'data' => $purchaseRequisitionSlipDetail,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(CreatePurchaseRequisitionSlipDetailRequest $request)
    {
        $purchaseRequisitionSlipDetail = $this->purchaseRequisitionSlipDetailRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_PURCHASE_REQUISITION_SLIP_DETAIL,
            'data' => $purchaseRequisitionSlipDetail,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(UpdatePurchaseRequisitionSlipDetailRequest $request, $id)
    {
        $purchaseRequisitionSlipDetail = $this->purchaseRequisitionSlipDetailRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_PURCHASE_REQUISITION_SLIP_DETAIL,
            'data' => $purchaseRequisitionSlipDetail,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->purchaseRequisitionSlipDetailRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_PURCHASE_REQUISITION_SLIP_DETAIL,
        ];

        return response()->json($response, $response['code']);
    }
}
