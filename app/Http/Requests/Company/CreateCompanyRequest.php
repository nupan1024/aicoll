<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class CreateCompanyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nit' => 'required|digits:9|unique:companies,nit',
            'name' => 'required|string|max:100',
            'address' => 'required|string|max:100',
            'phone_number' => 'required|digits:10',
        ];
    }
}
