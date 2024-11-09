<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PrsV2Request;
use App\Http\Requests\CreatePrsV2Request;
use App\Http\Requests\UpdatePrsV2Request;
use App\Models\PrsV2;
use App\Repositories\IPrsV2Repository;
use App\Response;
use Illuminate\Http\Request;

class PrsV2Controller extends Controller
{
    private IPrsV2Repository $prsV2Repository;

    public function __construct(IPrsV2Repository $prsV2Repository)
    {
        $this->prsV2Repository = $prsV2Repository;
    }

    public function index()
    {
        $prsV2 = $this->prsV2Repository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_PRS,
            'count' => PrsV2::count(),
            'data' => $prsV2,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $prsV2 = $this->prsV2Repository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_PRS,
            'data' => $prsV2,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(PrsV2Request $request)
    {
        $prsV2 = $this->prsV2Repository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_PRS,
            'data' => $prsV2,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(PrsV2Request $request, $id)
    {
        $prsV2 = $this->prsV2Repository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_PRS,
            'data' => $prsV2,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->prsV2Repository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_PRS,
        ];

        return response()->json($response, $response['code']);
    }
}
