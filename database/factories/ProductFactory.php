<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductFactory extends Factory
{
    protected $model = Products::class;
  
    public function definition(): array
    {
        return [
            'category_id' => $this->faker->numberBetween(1, 3), // Assuming you have 5 categories
            'product_name' => $this->faker->sentence,
            'product_slug' => $this->faker->slug,
            'product_code' => $this->faker->unique()->ean8,
            'product_qty' => $this->faker->numberBetween(1, 100),
            'selling_price' => $this->faker->randomFloat(2, 10, 1000),
            'discount_price' => $this->faker->randomFloat(2, 1, 100),
            'short_descp' => $this->faker->paragraph,
            'product_image' => $this->faker->imageUrl(),
            'special_deals' => $this->faker->boolean,
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
