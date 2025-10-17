<?php

namespace App\Http\Services;

use App\Exports\ToDoListExport;
use App\Http\Resources\CreateToDoListResponse;
use App\Models\ToDoList;
use App\Support\Interfaces\Repositories\ToDoListRepositoryInterface;
use App\Support\Interfaces\Services\ToDoListServiceInterface;
use App\Support\Model\CreateToDoListReqModel;
use App\Support\Model\ToDoListFilterReqModel;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpKernel\Exception\HttpException;

use function Laravel\Prompts\error;

class ToDoListService implements ToDoListServiceInterface
{
  public function __construct(
    protected ToDoListRepositoryInterface $toDoListRepository
  ) {}
  public function storeToDoList(CreateToDoListReqModel $data): CreateToDoListResponse
  {
    $dueDate = Carbon::make($data->due_date);
    if ($dueDate->lessThan(Carbon::now())) {
      throw new HttpException("404", "the due date cannot in the past");
    }

    try {
      return CreateToDoListResponse::make($this->toDoListRepository->Create($data));
    } catch (\Throwable $th) {
      throw $th;
    }
  }
  public function generateExcelReport(ToDoListFilterReqModel $reqModel)
  {
    $report = $this->toDoListRepository->getToDoList($reqModel);
    $reportCollection = Collection::make($report);
    $numberOfTodos = $reportCollection->count();
    $totalTimeTracked = $reportCollection->sum('time_tracked');

    return Excel::download(new ToDoListExport($report, $numberOfTodos, $totalTimeTracked), 'ToDoListReport.xlsx');
  }
  // public function getToDoDataChart() {}
}
