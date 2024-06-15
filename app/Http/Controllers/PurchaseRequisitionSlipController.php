<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePurchaseRequisitionSlipRequest;
use App\Http\Requests\UpdatePurchaseRequisitionSlipRequest;
use App\Models\PurchaseRequisitionSlip;
use App\Repositories\Interface\IPurchaseRequisitionSlipRepository;
use App\Response;
use Illuminate\Http\Request;

class PurchaseRequisitionSlipController extends Controller
{
    private IPurchaseRequisitionSlipRepository $purchaseRequisitionSlipRepository;

    public function __construct(IPurchaseRequisitionSlipRepository $purchaseRequisitionSlipRepository)
    {
        $this->purchaseRequisitionSlipRepository = $purchaseRequisitionSlipRepository;
    }

    public function index()
    {
        $purchaseRequisitionSlips = $this->purchaseRequisitionSlipRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_PURCHASE_REQUISITION_SLIPS,
            'count' => PurchaseRequisitionSlip::count(),
            'data' => $purchaseRequisitionSlips,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $purchaseRequisitionSlip = $this->purchaseRequisitionSlipRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_PURCHASE_REQUISITION_SLIP,
            'data' => $purchaseRequisitionSlip,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(CreatePurchaseRequisitionSlipRequest $request)
    {
        $purchaseRequisitionSlip = $this->purchaseRequisitionSlipRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_PURCHASE_REQUISITION_SLIP,
            'data' => $purchaseRequisitionSlip,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(UpdatePurchaseRequisitionSlipRequest $request, $id)
    {
        $purchaseRequisitionSlip = $this->purchaseRequisitionSlipRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_PURCHASE_REQUISITION_SLIP,
            'data' => $purchaseRequisitionSlip,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->purchaseRequisitionSlipRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_PURCHASE_REQUISITION_SLIP,
        ];

        return response()->json($response, $response['code']);
    }
}
