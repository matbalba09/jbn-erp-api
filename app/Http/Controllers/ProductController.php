<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Repositories\Interface\IProductRepository;
use App\Response;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private IProductRepository $productRepository;

    public function __construct(IProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_PRODUCTS,
            'count' => Product::count(),
            'data' => $products,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $product = $this->productRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_PRODUCT,
            'data' => $product,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(CreateProductRequest $request)
    {
        $product = $this->productRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_PRODUCT,
            'data' => $product,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = $this->productRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_PRODUCT,
            'data' => $product,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->productRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_PRODUCT,
        ];

        return response()->json($response, $response['code']);
    }
}
