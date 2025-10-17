<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToDoListCreateRequest;
use App\Http\Requests\ToDoListRequest;
use App\Http\Resources\CreateToDoListResponse;
use App\Support\Interfaces\Services\ToDoListServiceInterface;
use App\Support\Model\CreateToDoListReqModel;

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
            return CreateToDoListResponse::make($this->toDoListService->storeToDoList($reqModel));
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage()
            ], 400);
        }
    }

    public function GenerateExcelReport(ToDoListRequest $request) {}
}
