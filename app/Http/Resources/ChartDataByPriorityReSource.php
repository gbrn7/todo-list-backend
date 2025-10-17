<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class ChartDataByPriorityReSource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = Collection::make(parent::toArray($request))->mapWithKeys(function (array $item, int $key) {
            return [$item['priority'] => $item['count']];
        });

        return [
            "priority_summary" => $data,
        ];
    }
}
