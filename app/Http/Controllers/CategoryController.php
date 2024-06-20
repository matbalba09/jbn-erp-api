<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Repositories\Interface\ICategoryRepository;
use App\Response;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private ICategoryRepository $categoryRepository;

    public function __construct(ICategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_CATEGORIES,
            'count' => Category::count(),
            'data' => $categories,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $category = $this->categoryRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_CATEGORY,
            'data' => $category,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(CreateCategoryRequest $request)
    {
        $category = $this->categoryRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_CATEGORY,
            'data' => $category,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = $this->categoryRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_CATEGORY,
            'data' => $category,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->categoryRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_CATEGORY,
        ];

        return response()->json($response, $response['code']);
    }
}
