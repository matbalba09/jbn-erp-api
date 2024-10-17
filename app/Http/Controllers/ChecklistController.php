<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChecklistRequest;
use App\Http\Requests\CreateChecklistRequest;
use App\Http\Requests\UpdateChecklistRequest;
use App\Models\Checklist;
use App\Repositories\IChecklistRepository;
use App\Response;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    private IChecklistRepository $checklistRepository;

    public function __construct(IChecklistRepository $checklistRepository)
    {
        $this->checklistRepository = $checklistRepository;
    }

    public function index()
    {
        $checklists = $this->checklistRepository->getAll();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_CHECKLISTS,
            'count' => Checklist::count(),
            'data' => $checklists,
        ];

        return response()->json($response, $response['code']);
    }

    public function getById($id)
    {
        $checklist = $this->checklistRepository->getById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_CHECKLIST,
            'data' => $checklist,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(ChecklistRequest $request)
    {
        $checklist = $this->checklistRepository->create($request);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_CHECKLIST,
            'data' => $checklist,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(ChecklistRequest $request, $id)
    {
        $checklist = $this->checklistRepository->update($request, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_CHECKLIST,
            'data' => $checklist,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->checklistRepository->delete($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_CHECKLIST,
        ];

        return response()->json($response, $response['code']);
    }
}
