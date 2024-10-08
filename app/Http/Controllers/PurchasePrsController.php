<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PurchasePrsRequest;
use App\Http\Requests\CreatePurchasePrsRequest;
use App\Http\Requests\UpdatePurchasePrsRequest;
use App\Models\PurchasePrs;
use App\Repositories\IPurchasePrsRepository;
use App\Response;
use Illuminate\Http\Request;

class PurchasePrsController extends Controller
{
    private IPurchasePrsRepository $purchasePrsRepository;

    public function __construct(IPurchasePrsRepository $purchasePrsRepository)
    {
        $this->purchasePrsRepository = $purchasePrsRepository;
    }

    public function index()
    {
        $purchasePrs = $this->purchasePrsRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_PURCHASE_PRS,
            'count' => PurchasePrs::count(),
            'data' => $purchasePrs,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $purchasePrs = $this->purchasePrsRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_PURCHASE_PRS,
            'data' => $purchasePrs,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(PurchasePrsRequest $request)
    {
        $purchasePrs = $this->purchasePrsRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_PURCHASE_PRS,
            'data' => $purchasePrs,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(PurchasePrsRequest $request, $id)
    {
        $purchasePrs = $this->purchasePrsRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_PURCHASE_PRS,
            'data' => $purchasePrs,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->purchasePrsRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_PURCHASE_PRS,
        ];

        return response()->json($response, $response['code']);
    }
}
