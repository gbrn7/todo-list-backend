<?php

namespace App\Support\Model;

use App\Support\Enums\TypeEnum;
use Illuminate\Http\Request;

class ToDoListFilterReqModel
{
  public ?string $title;
  public ?string $assignee;
  public ?string $startDate;
  public ?string $endDate;
  public ?string $minTimeTracked;
  public ?string $maxTimeTracked;
  public ?string $status;
  public ?string $priority;
  public TypeEnum $type;

  public function __construct(Request $request)
  {
    $this->title = $request->title;
    $this->assignee = $request->assignee;
    $this->startDate = $request->start_date;
    $this->endDate = $request->end_date;
    $this->minTimeTracked = $request->min_time_tracked;
    $this->maxTimeTracked = $request->max_time_tracked;
    $this->status = $request->status;
    $this->priority = $request->priority;
    $this->type = $request->type;
  }
}
