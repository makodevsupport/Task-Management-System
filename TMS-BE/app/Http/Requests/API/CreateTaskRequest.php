<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use App\TaskStatusEnum;
use Illuminate\Validation\Rules\Enum;

class CreateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    protected function prepareForValidation()
    {
        if (!$this->has('status')) {
            $this->merge([
                'status' => TaskStatusEnum::PENDING->value,
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => ["required", "string", "max:255"],
            //"unique:tasks,title"
            "description" => ["nullable", "string"],
            'status' => ['required', new Enum(TaskStatusEnum::class)],
            "due_date" => ["nullable", "date", "date_format:Y-m-d"]
        ];
    }
}
