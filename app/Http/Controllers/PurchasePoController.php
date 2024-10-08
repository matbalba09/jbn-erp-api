<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PurchasePoRequest;
use App\Http\Requests\CreatePurchasePoRequest;
use App\Http\Requests\UpdatePurchasePoRequest;
use App\Models\PurchasePo;
use App\Repositories\IPurchasePoRepository;
use App\Response;
use Illuminate\Http\Request;

class PurchasePoController extends Controller
{
    private IPurchasePoRepository $purchasePoRepository;

    public function __construct(IPurchasePoRepository $purchasePoRepository)
    {
        $this->purchasePoRepository = $purchasePoRepository;
    }

    public function index()
    {
        $purchasePos = $this->purchasePoRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_PURCHASE_PO,
            'count' => PurchasePo::count(),
            'data' => $purchasePos,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $purchasePo = $this->purchasePoRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_PURCHASE_PO,
            'data' => $purchasePo,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(PurchasePoRequest $request)
    {
        $purchasePo = $this->purchasePoRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_PURCHASE_PO,
            'data' => $purchasePo,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(PurchasePoRequest $request, $id)
    {
        $purchasePo = $this->purchasePoRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_PURCHASE_PO,
            'data' => $purchasePo,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->purchasePoRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_PURCHASE_PO,
        ];

        return response()->json($response, $response['code']);
    }
}
