<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeRequest;
use App\Models\Attribute;
use App\Repositories\IAttributeRepository;
use App\Response;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    private IAttributeRepository $attributeRepository;

    public function __construct(IAttributeRepository $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
    }

    public function index()
    {
        $attributes = $this->attributeRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_ATTRIBUTES,
            'count' => Attribute::count(),
            'data' => $attributes,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $attribute = $this->attributeRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ATTRIBUTE,
            'data' => $attribute,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(AttributeRequest $request)
    {
        $attribute = $this->attributeRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_ATTRIBUTE,
            'data' => $attribute,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(AttributeRequest $request, $id)
    {
        $attribute = $this->attributeRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_ATTRIBUTE,
            'data' => $attribute,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->attributeRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_ATTRIBUTE,
        ];

        return response()->json($response, $response['code']);
    }
}
