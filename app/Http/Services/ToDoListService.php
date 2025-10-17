<?php

namespace App\Http\Services;

use App\Models\ToDoList;
use App\Support\Interfaces\Repositories\ToDoListRepositoryInterface;
use App\Support\Interfaces\Services\ToDoListServiceInterface;
use App\Support\Model\CreateToDoListReqModel;
use Carbon\Carbon;
use Symfony\Component\HttpKernel\Exception\HttpException;

use function Laravel\Prompts\error;

class ToDoListService implements ToDoListServiceInterface
{
  public function __construct(
    protected ToDoListRepositoryInterface $toDoListRepository
  ) {}
  public function storeToDoList(CreateToDoListReqModel $data): ToDoList
  {
    $dueDate = Carbon::make($data->due_date);
    if ($dueDate->lessThan(Carbon::now())) {
      throw new HttpException("404", "the due date cannot in the past");
    }

    try {
      return $this->toDoListRepository->create($data);
    } catch (\Throwable $th) {
      throw $th;
    }
  }
  // public function generateExcelReport(ToDoListFilterReqModel $reqModel) {}
  // public function getToDoDataChart() {}
}
