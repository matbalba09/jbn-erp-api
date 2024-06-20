<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductAttributeRequest;
use App\Http\Requests\UpdateProductAttributeRequest;
use App\Models\ProductAttribute;
use App\Repositories\Interface\IProductAttributeRepository;
use App\Response;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    private IProductAttributeRepository $productAttributeRepository;

    public function __construct(IProductAttributeRepository $productAttributeRepository)
    {
        $this->productAttributeRepository = $productAttributeRepository;
    }

    public function index()
    {
        $productAttributes = $this->productAttributeRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_PRODUCT_ATTRIBUTES,
            'count' => ProductAttribute::count(),
            'data' => $productAttributes,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $productAttribute = $this->productAttributeRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_PRODUCT_ATTRIBUTE,
            'data' => $productAttribute,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(CreateProductAttributeRequest $request)
    {
        $productAttribute = $this->productAttributeRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_PRODUCT_ATTRIBUTE,
            'data' => $productAttribute,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(UpdateProductAttributeRequest $request, $id)
    {
        $productAttribute = $this->productAttributeRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_PRODUCT_ATTRIBUTE,
            'data' => $productAttribute,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->productAttributeRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_PRODUCT_ATTRIBUTE,
        ];

        return response()->json($response, $response['code']);
    }
}
