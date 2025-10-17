<?php

namespace App\Http\Resources;

use App\Support\Enums\StatusEnum;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class ChartDataByStatusReSource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $data = Collection::make(parent::toArray($request))->mapWithKeys(function (array $item, int $key) {
            return [$item['status'] => $item['count']];
        });

        if (!$data->has(StatusEnum::PENDING->value)) {
            $data->put(StatusEnum::PENDING->value, 0);
        }
        if (!$data->has(StatusEnum::OPEN->value)) {
            $data->put(StatusEnum::OPEN->value, 0);
        }
        if (!$data->has(StatusEnum::INPROGRESS->value)) {
            $data->put(StatusEnum::INPROGRESS->value, 0);
        }
        if (!$data->has(StatusEnum::COMPLETED->value)) {
            $data->put(StatusEnum::COMPLETED->value, 0);
        }

        return [
            "status_summary" => $data,
        ];
    }
}
