<?php

namespace App\Http\Resources;

use App\Support\Enums\PriorityEnum;
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

        if (!$data->has(PriorityEnum::LOW->value)) {
            $data->put(PriorityEnum::LOW->value, 0);
        }
        if (!$data->has(PriorityEnum::MEDIUM->value)) {
            $data->put(PriorityEnum::MEDIUM->value, 0);
        }
        if (!$data->has(PriorityEnum::HIGH->value)) {
            $data->put(PriorityEnum::HIGH->value, 0);
        }

        return [
            "priority_summary" => $data,
        ];
    }
}
