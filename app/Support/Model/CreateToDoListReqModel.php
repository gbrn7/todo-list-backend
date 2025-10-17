<?php

namespace App\Support\Model;

use App\Support\Enums\PriorityEnum;
use App\Support\Enums\StatusEnum;
use Brick\Math\BigInteger;
use Illuminate\Http\Request;

class CreateToDoListReqModel
{
  public string $title;
  public ?string $assignee;
  public string $due_date;
  public int $time_tracked;
  public string $status;
  public string $priority;

  public function __construct(Request $request)
  {
    $this->title = $request->title;
    $this->assignee = $request->assignee;
    $this->due_date = $request->due_date;
    $this->time_tracked = $request->time_tracked;
    $this->status = $request->status ? $request->status : StatusEnum::PENDING->value;
    $this->priority = $request->priority;
  }
}
