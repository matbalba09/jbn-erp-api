<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\QualityPoRequest;
use App\Http\Requests\CreateQualityPoRequest;
use App\Http\Requests\UpdateQualityPoRequest;
use App\Models\QualityPo;
use App\Repositories\IQualityPoRepository;
use App\Response;
use Illuminate\Http\Request;

class QualityPoController extends Controller
{
    private IQualityPoRepository $qualityPoRepository;

    public function __construct(IQualityPoRepository $qualityPoRepository)
    {
        $this->qualityPoRepository = $qualityPoRepository;
    }

    public function index()
    {
        $qualityPos = $this->qualityPoRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_QUALITY_PO,
            'count' => QualityPo::count(),
            'data' => $qualityPos,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $qualityPo = $this->qualityPoRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_QUALITY_PO,
            'data' => $qualityPo,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(QualityPoRequest $request)
    {
        $qualityPo = $this->qualityPoRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_QUALITY_PO,
            'data' => $qualityPo,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(QualityPoRequest $request, $id)
    {
        $qualityPo = $this->qualityPoRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_QUALITY_PO,
            'data' => $qualityPo,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->qualityPoRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_QUALITY_PO,
        ];

        return response()->json($response, $response['code']);
    }
}
