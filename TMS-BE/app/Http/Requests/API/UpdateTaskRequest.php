<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\TaskStatusEnum;
use Illuminate\Validation\Rules\Enum;

// use App\Rules\EnumValueRule;



class UpdateTaskRequest extends FormRequest
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
            "title" => ["required", "string", "max:255"],
            "description" => ["nullable", "string"],
            // 'status' => [
            //     'required',
            //     Rule::in(['pending', 'inprogress', 'completed']),
            // ],
            'status' => ['required', new Enum(TaskStatusEnum::class)],
            //"status" => ["required", TaskStatusEnum::class],
            "due_date" => ["nullable", "date","date_format:Y-m-d"]
        ];
    }
}
