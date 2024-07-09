<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePurchaseRequisitionRequest;
use App\Http\Requests\PurchaseRequisitionRequest;
use App\Http\Requests\UpdatePurchaseRequisitionRequest;
use App\Models\PurchaseRequisition;
use App\Repositories\IPurchaseRequisitionRepository;
use App\Response;
use Illuminate\Http\Request;

class PurchaseRequisitionController extends Controller
{
    private IPurchaseRequisitionRepository $prsRepository;

    public function __construct(IPurchaseRequisitionRepository $prsRepository)
    {
        $this->prsRepository = $prsRepository;
    }

    public function index()
    {
        $prs = $this->prsRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_PURCHASE_REQUISITIONS,
            'count' => PurchaseRequisition::count(),
            'data' => $prs,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $prs = $this->prsRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_PURCHASE_REQUISITION,
            'data' => $prs,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(PurchaseRequisitionRequest $request)
    {
        $prs = $this->prsRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_PURCHASE_REQUISITION,
            'data' => $prs,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(Request $request, $id)
    {
        $prs = $this->prsRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_PURCHASE_REQUISITION,
            'data' => $prs,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->prsRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_PURCHASE_REQUISITION,
        ];

        return response()->json($response, $response['code']);
    }
}
