<?php

namespace App\Domain\Companies\Actions;

use App\Models\Company;
use Illuminate\Support\Facades\Log;

class UpdateCompany
{
    public static function execute(array $params, Company $company): bool
    {
        try {
            $company->name = $params['name'];
            $company->address = $params['address'];
            $company->phone_number = $params['phone_number'];
            $company->status = $params['status'];

            return $company->save();
        } catch (\Exception $e) {
            Log::channel('Company')->error('Error updating company: '.$e->getMessage());

            return false;
        }
    }
}
