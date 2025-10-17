<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class ChartDataByAssigneeReSource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = Collection::make(parent::toArray($request))->mapWithKeys(function (array $item, int $key) {
            return [
                $item['assignee'] => [
                    'total_todos' => $item['total_todos'],
                    'total_pending_todos' => $item['total_pending_todos'],
                    'total_timetracked_completed_todos' => $item['total_timetracked'],
                ],
            ];
        });

        return [
            "assignee_summary" => $data,
        ];
    }
}
