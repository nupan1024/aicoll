<?php

namespace App\Http\Requests\Company;

use App\Models\Company;
use Illuminate\Foundation\Http\FormRequest;

class CreateCompanyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nit' => 'required|string|min:9|max:9|unique:'.Company::class,
            'name' => 'required|string|max:100',
            'address' => 'required|string|max:100',
            'phone_number' => 'required|string|max:10',
            'status' => ['required', 'boolean'],
        ];
    }
}
