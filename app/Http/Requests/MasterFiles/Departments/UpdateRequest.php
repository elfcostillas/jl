<?php

namespace App\Http\Requests\MasterFiles\Departments;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'id' => 'required|exists:departments,id',
            'dept_code' => 'required|unique:departments,dept_code,'. $this->input('id'),
            'dept_name' => 'required|unique:departments,dept_name,'. $this->input('id')

        ];
    }
}
