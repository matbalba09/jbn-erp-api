<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PrsSupplierItemRequest;
use App\Models\PrsSupplierItem;
use App\Repositories\IPrsSupplierItemRepository;
use App\Response;
use Illuminate\Http\Request;

class PrsSupplierItemController extends Controller
{
    private IPrsSupplierItemRepository $prsSupplierItemRepository;

    public function __construct(IPrsSupplierItemRepository $prsSupplierItemRepository)
    {
        $this->prsSupplierItemRepository = $prsSupplierItemRepository;
    }

    public function index()
    {
        $prsSupplierItems = $this->prsSupplierItemRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_PRS_SUPPLIER_ITEMS,
            'count' => PrsSupplierItem::count(),
            'data' => $prsSupplierItems,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $prsSupplierItem = $this->prsSupplierItemRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_PRS_SUPPLIER_ITEM,
            'data' => $prsSupplierItem,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(PrsSupplierItemRequest $request)
    {
        $prsSupplierItem = $this->prsSupplierItemRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_PRS_SUPPLIER_ITEM,
            'data' => $prsSupplierItem,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(PrsSupplierItemRequest $request, $id)
    {
        $prsSupplierItem = $this->prsSupplierItemRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_PRS_SUPPLIER_ITEM,
            'data' => $prsSupplierItem,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->prsSupplierItemRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_PRS_SUPPLIER_ITEM,
        ];

        return response()->json($response, $response['code']);
    }
}
