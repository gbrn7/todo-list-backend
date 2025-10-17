<?php

namespace App\Support\Interfaces\Repositories;

use App\Models\ToDoList;
use App\Support\Model\CreateToDoListReqModel;
use App\Support\Model\ToDoListFilterReqModel;
use Illuminate\Database\Eloquent\Collection;

interface ToDoListRepositoryInterface
{
  public function Create(CreateToDoListReqModel $data): ToDoList;
  public function getToDoList(ToDoListFilterReqModel $reqModel): Collection;
  public function  getChartDataByStatus();
  public function  getChartDataByPriority();
  public function  getChartDataByAssignee();
}
