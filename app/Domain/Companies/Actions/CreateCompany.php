<?php

namespace App\Domain\Companies\Actions;

use App\Domain\Companies\Models\Company;
use Illuminate\Support\Facades\Log;

class CreateCompany
{
    public static function execute(array $params): bool
    {
        try {
            $company = new Company();
            $company->nit = $params['nit'];
            $company->name = $params['name'];
            $company->address = $params['address'];
            $company->phone_number = $params['phone_number'];
            $company->status = $params['status'];

            return $company->save();
        } catch (\Exception $e) {
            Log::channel('Company')->error('Error creating company: '.$e->getMessage());

            return false;
        }
    }
}
