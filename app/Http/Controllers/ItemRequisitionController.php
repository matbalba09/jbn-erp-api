<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequisitionRequest;
use App\Http\Requests\CreateItemRequisitionRequest;
use App\Http\Requests\UpdateItemRequisitionRequest;
use App\Models\ItemRequisition;
use App\Repositories\IItemRequisitionRepository;
use App\Response;
use Illuminate\Http\Request;

class ItemRequisitionController extends Controller
{
    private IItemRequisitionRepository $itemRequisitionRepository;

    public function __construct(IItemRequisitionRepository $itemRequisitionRepository)
    {
        $this->itemRequisitionRepository = $itemRequisitionRepository;
    }

    public function index()
    {
        $itemRequisitions = $this->itemRequisitionRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_ITEM_REQUISITIONS,
            'count' => ItemRequisition::count(),
            'data' => $itemRequisitions,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $itemRequisition = $this->itemRequisitionRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ITEM_REQUISITION,
            'data' => $itemRequisition,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(ItemRequisitionRequest $request)
    {
        $itemRequisition = $this->itemRequisitionRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_ITEM_REQUISITION,
            'data' => $itemRequisition,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(ItemRequisitionRequest $request, $id)
    {
        $itemRequisition = $this->itemRequisitionRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_ITEM_REQUISITION,
            'data' => $itemRequisition,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->itemRequisitionRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_ITEM_REQUISITION,
        ];

        return response()->json($response, $response['code']);
    }
}
