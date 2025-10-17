<?php

namespace App\Support\Enums;

enum TypeEnum: string
{
  case STATUS = 'status';
  case PRIORITY = 'priority';
  case ASSIGNEE = 'assignee';
}
