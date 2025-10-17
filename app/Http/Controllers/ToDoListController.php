<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToDoListCreateRequest;
use App\Http\Requests\ToDoListRequest;
use App\Http\Resources\CreateToDoListResponse;
use App\Support\Interfaces\Services\ToDoListServiceInterface;
use App\Support\Model\CreateToDoListReqModel;
use App\Support\Model\ToDoListFilterReqModel;

use function Laravel\Prompts\error;

class ToDoListController extends Controller
{
    public function __construct(
        protected ToDoListServiceInterface $toDoListService
    ) {}

    public function CreateToDoList(ToDoListCreateRequest $request)
    {
        $reqModel = new CreateToDoListReqModel($request);
        try {
            return $this->toDoListService->storeToDoList($reqModel);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage()
            ], 400);
        }
    }

    public function GenerateExcelReport(ToDoListRequest $request)
    {
        $reqModel = new ToDoListFilterReqModel($request);
        try {
            return $this->toDoListService->generateExcelReport($reqModel);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage()
            ], 400);
        }
    }
}
