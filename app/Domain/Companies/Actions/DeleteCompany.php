<?php

namespace App\Domain\Companies\Actions;

use App\Domain\Companies\Models\Company;
use Illuminate\Support\Facades\Log;

class DeleteCompany
{
    public static function execute(Company $company): bool
    {
        try {
            return $company->delete();
        } catch (\Exception $e) {
            Log::channel('Company')->error('Error deleting company: '.$e->getMessage());

            return false;
        }
    }
}
