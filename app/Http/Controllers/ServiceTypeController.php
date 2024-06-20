<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateServiceTypeRequest;
use App\Http\Requests\UpdateServiceTypeRequest;
use App\Models\ServiceType;
use App\Repositories\Interface\IServiceTypeRepository;
use App\Response;
use Illuminate\Http\Request;

class ServiceTypeController extends Controller
{
    private IServiceTypeRepository $serviceTypeRepository;

    public function __construct(IServiceTypeRepository $serviceTypeRepository)
    {
        $this->serviceTypeRepository = $serviceTypeRepository;
    }

    public function index()
    {
        $serviceTypes = $this->serviceTypeRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_SERVICE_TYPES,
            'count' => ServiceType::count(),
            'data' => $serviceTypes,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $serviceType = $this->serviceTypeRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_SERVICE_TYPE,
            'data' => $serviceType,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(CreateServiceTypeRequest $request)
    {
        $serviceType = $this->serviceTypeRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_SERVICE_TYPE,
            'data' => $serviceType,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(UpdateServiceTypeRequest $request, $id)
    {
        $serviceType = $this->serviceTypeRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_SERVICE_TYPE,
            'data' => $serviceType,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->serviceTypeRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_SERVICE_TYPE,
        ];

        return response()->json($response, $response['code']);
    }
}
