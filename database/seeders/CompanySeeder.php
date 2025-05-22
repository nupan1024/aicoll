<?php

namespace Database\Seeders;

use App\Domain\Companies\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        Company::factory()->count(15)->create();
    }
}
