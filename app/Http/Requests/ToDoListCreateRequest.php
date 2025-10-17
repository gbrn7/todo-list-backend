<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ToDoListCreateRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'title' => ['required'],
            'assignee' => ['nullable'],
            'due_date' => ['required', 'date'],
            'time_tracked' => ['required', 'numeric'],
            'status' => ['nullable', 'in:pending,open,in_progress,completed'],
            'priority' => ['required', 'in:low,medium,high'],
        ];
    }


    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'message' => 'Validation errors',
                'errors' => $validator->errors(),
            ], 422)
        );
    }
}
