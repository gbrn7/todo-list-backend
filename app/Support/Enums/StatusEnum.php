<?php

namespace App\Support\Enums;

enum StatusEnum: string
{
  case PENDING = 'pending';
  case OPEN = 'open';
  case INPROGRESS = 'in_progress';
  case COMPLETED = 'completed';
}
