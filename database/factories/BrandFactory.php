<?php

namespace Database\Factories;

// database/factories/BrandFactory.php
namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    protected $model = Brand::class;

    public function definition()
    {
        return [
            'brand_name' => $this->faker->company,
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
