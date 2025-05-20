<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    protected $model = Company::class;
    public function definition(): array
    {
        return [
            'nit' => $this->faker->unique()->numberBetween(100000000, 999999999),
            'name' => $this->faker->company,
            'address' => $this->faker->address,
            'phone_number' => $this->faker->numerify('##########'),
            'status' => $this->faker->randomElement(['ACTIVE', 'INACTIVE'])
        ];
    }
}
