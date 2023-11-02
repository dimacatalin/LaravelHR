<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'project_id' => 'bail|required',
            'salary_id' => 'bail|required',
            'first_name' => 'bail|required|max:255',
            'last_name' => 'bail|required|max:255',
            'email' => 'bail|email|required',
            'phone_number' => 'bail|required|max:20',
            'is_active' => 'bail|max:255',
        ];
    }
}
