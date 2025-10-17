<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CreateToDoListResponse extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'assignee' => $this->assignee,
            'due_date' => $this->due_date,
            'time_tracked' => $this->time_tracked,
            'status' => $this->status,
            'priority' => $this->priority,
        ];
    }
}
