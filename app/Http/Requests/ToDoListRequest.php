<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ToDoListRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => "nullable",
            'assignee' => "nullable",
            'start_date' => "nullable",
            'end_date' => "nullable",
            'min_time_tracked' => "nullable",
            'max_time_tracked' => "nullable",
            'status' => "nullable",
            'priority' => "nullable",
        ];
    }
}
