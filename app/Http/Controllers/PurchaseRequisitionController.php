<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePurchaseRequisitionRequest;
use App\Http\Requests\UpdatePurchaseRequisitionRequest;
use App\Models\PurchaseRequisition;
use App\Repositories\Interface\IPurchaseRequisitionRepository;
use App\Response;
use Illuminate\Http\Request;

class PurchaseRequisitionController extends Controller
{
    private IPurchaseRequisitionRepository $purchaseRequisitionRepository;

    public function __construct(IPurchaseRequisitionRepository $purchaseRequisitionRepository)
    {
        $this->purchaseRequisitionRepository = $purchaseRequisitionRepository;
    }

    public function index()
    {
        $purchaseRequisitions = $this->purchaseRequisitionRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_PURCHASE_REQUISITIONS,
            'count' => PurchaseRequisition::count(),
            'data' => $purchaseRequisitions,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $purchaseRequisition = $this->purchaseRequisitionRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_PURCHASE_REQUISITION,
            'data' => $purchaseRequisition,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(CreatePurchaseRequisitionRequest $request)
    {
        $purchaseRequisition = $this->purchaseRequisitionRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_PURCHASE_REQUISITION,
            'data' => $purchaseRequisition,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(UpdatePurchaseRequisitionRequest $request, $id)
    {
        $purchaseRequisition = $this->purchaseRequisitionRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_PURCHASE_REQUISITION,
            'data' => $purchaseRequisition,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->purchaseRequisitionRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_PURCHASE_REQUISITION,
        ];

        return response()->json($response, $response['code']);
    }
}
