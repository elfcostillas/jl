<?php

namespace App\Http\Requests\MasterFiles\Company;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'company_name' => 'required|unique:companies,company_name|string|max:255',    
            'company_address' => 'required|string|max:255',    
            'company_status' => 'required|string|max:255',    
            'company_shortname' => 'required|string|max:255',    
        ];
    }
    
}
