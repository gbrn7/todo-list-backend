<?php

namespace App\Support\Interfaces\Services;

use App\Models\ToDoList;
use App\Support\Model\CreateToDoListReqModel;

interface ToDoListServiceInterface
{
  public function storeToDoList(CreateToDoListReqModel $data): ToDoList;
  // public function generateExcelReport(ToDoListFilterReqModel $reqModel);
  // public function getToDoDataChart();
}
