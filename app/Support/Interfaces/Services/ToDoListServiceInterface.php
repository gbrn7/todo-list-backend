<?php

namespace App\Support\Interfaces\Services;

use App\Http\Resources\CreateToDoListResponse;
use App\Models\ToDoList;
use App\Support\Model\CreateToDoListReqModel;
use App\Support\Model\ToDoListFilterReqModel;

interface ToDoListServiceInterface
{
  public function storeToDoList(CreateToDoListReqModel $data): CreateToDoListResponse;
  public function generateExcelReport(ToDoListFilterReqModel $reqModel);
  public function getToDoDataChart(string $dataType);
}
