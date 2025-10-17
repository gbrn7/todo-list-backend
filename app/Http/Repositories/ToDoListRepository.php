<?php

namespace App\Http\Repositories;

use App\Models\ToDoList;
use App\Support\Interfaces\Repositories\ToDoListRepositoryInterface;
use App\Support\Model\CreateToDoListReqModel;
use App\Support\Model\ToDoListFilterReqModel;
use Illuminate\Database\Eloquent\Collection;

class ToDoListRepository implements ToDoListRepositoryInterface
{
  public function Create(CreateToDoListReqModel $data): ToDoList
  {
    return ToDoList::create((array)$data);
  }
  public function getToDoList(ToDoListFilterReqModel $reqModel): Collection
  {
    return ToDoList::query()
      ->when($reqModel->title, function ($query) use ($reqModel) {
        return $query->where('title', 'like', '%' . $reqModel->title . '%');
      })
      ->when($reqModel->assignee, function ($query) use ($reqModel) {
        $names = explode(',', $reqModel->assignee);

        return $query->whereIn('assignee', $names);
      })
      ->when($reqModel->startDueDate, function ($query) use ($reqModel) {
        return $query->where('due_date', '>=', $reqModel->startDueDate);
      })
      ->when($reqModel->endDueDate, function ($query) use ($reqModel) {
        return $query->where('due_date', '<=', $reqModel->endDueDate);
      })
      ->when($reqModel->minTimeTracked, function ($query) use ($reqModel) {
        return $query->where('time_tracked', '>=', $reqModel->minTimeTracked);
      })
      ->when($reqModel->maxTimeTracked, function ($query) use ($reqModel) {
        return $query->where('time_tracked', '<=', $reqModel->maxTimeTracked);
      })
      ->when($reqModel->status, function ($query) use ($reqModel) {
        $status = explode(',', $reqModel->status);

        return $query->whereIn('status', $status);
      })
      ->when($reqModel->priority, function ($query) use ($reqModel) {
        $priority = explode(',', $reqModel->priority);

        return $query->whereIn('priority', $priority);
      })
      ->orderBy('id', 'desc')
      ->get();
  }
}
