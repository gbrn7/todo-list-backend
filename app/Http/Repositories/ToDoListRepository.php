<?php

namespace App\Http\Repositories;

use App\Models\ToDoList;
use App\Support\Interfaces\Repositories\ToDoListRepositoryInterface;
use App\Support\Model\CreateToDoListReqModel;

class ToDoListRepository implements ToDoListRepositoryInterface
{
  public function Create(CreateToDoListReqModel $data): ToDoList
  {
    return ToDoList::create((array)$data);
  }
  // public function getToDoList(ToDoListFilterReqModel $reqModel): Collection {}
}
