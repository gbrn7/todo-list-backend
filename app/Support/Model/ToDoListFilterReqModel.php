<?php

namespace App\Support\Model;

use App\Support\Enums\TypeEnum;
use Illuminate\Http\Request;

class ToDoListFilterReqModel
{
  public ?string $title;
  public ?string $assignee;
  public ?string $startDueDate;
  public ?string $endDueDate;
  public ?string $minTimeTracked;
  public ?string $maxTimeTracked;
  public ?string $status;
  public ?string $priority;
  public ?string $type;

  public function __construct(Request $request)
  {
    $this->title = $request->title;
    $this->assignee = $request->assignee;
    $this->startDueDate = $request->start_due_date;
    $this->endDueDate = $request->end_due_date;
    $this->minTimeTracked = $request->min_time_tracked;
    $this->maxTimeTracked = $request->max_time_tracked;
    $this->status = $request->status;
    $this->priority = $request->priority;
    $this->type = $request->type;
  }
}
