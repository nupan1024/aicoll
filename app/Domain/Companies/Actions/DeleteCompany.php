<?php

namespace App\Domain\Companies\Actions;

use App\Constants\CompanyStatus;
use App\Domain\Companies\Models\Company;
use Illuminate\Support\Facades\Log;

class DeleteCompany
{
    public static function execute(Company $company): bool
    {
        try {
            if($company->status === CompanyStatus::ACTIVE->value){
                return false;
            }

            return $company->delete();
        } catch (\Exception $e) {
            Log::channel('Company')->error('Error deleting company: '.$e->getMessage());

            return false;
        }
    }
}
