<?php

namespace App\Http\Requests\MasterFiles\JobTitles;

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
            'id' => 'required|exists:job_titles,id',
            'dept_id' => 'required|exists:departments,id',
            'job_title_code' => 'required|string|max:255',
            'job_title_name' => 'required|string|max:255',
        ];
    }
}
