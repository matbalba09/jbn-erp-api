<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use App\Models\ProductCategory;
use App\Repositories\Interface\IProductCategoryRepository;
use App\Response;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    private IProductCategoryRepository $productCategoryRepository;

    public function __construct(IProductCategoryRepository $productCategoryRepository)
    {
        $this->productCategoryRepository = $productCategoryRepository;
    }

    public function index()
    {
        $productCategories = $this->productCategoryRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_PRODUCT_CATEGORIES,
            'count' => ProductCategory::count(),
            'data' => $productCategories,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $productCategory = $this->productCategoryRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_PRODUCT_CATEGORY,
            'data' => $productCategory,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(CreateProductCategoryRequest $request)
    {
        $productCategory = $this->productCategoryRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_PRODUCT_CATEGORY,
            'data' => $productCategory,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(UpdateProductCategoryRequest $request, $id)
    {
        $productCategory = $this->productCategoryRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_PRODUCT_CATEGORY,
            'data' => $productCategory,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->productCategoryRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_PRODUCT_CATEGORY,
        ];

        return response()->json($response, $response['code']);
    }
}
