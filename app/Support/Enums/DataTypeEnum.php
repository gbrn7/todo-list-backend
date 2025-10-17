<?php

namespace App\Support\Enums;

enum DataTypeEnum: string
{
  case STATUS = 'status';
  case PRIORITY = 'priority';
  case ASSIGNEE = 'assignee';
}
