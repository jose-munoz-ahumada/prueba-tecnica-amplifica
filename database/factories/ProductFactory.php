<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $prices = [1990, 2990, 5590];
        $name = $this->faker->text(60);
        $demo_image = 'img/products/demo.png';
        $slug = Str::slug($name);
        return [
            'name' => $name,
            'slug' => $slug,
            'description' => $this->faker->text(),
            'price' => $this->faker->randomElement($this->prices()),
            'image' => $demo_image,
            'active' => $this->faker->boolean(90),
            'weight' => $this->faker->randomFloat(2, 0, 10),
            'height' => $this->faker->randomFloat(2, 0, 10),
            'width' => $this->faker->randomFloat(2, 0, 10),
            'length' => $this->faker->randomFloat(2, 0, 10)
        ];
    }

    private function prices() {
        return [1990, 2990, 5590, 9990, 14990, 19990, 24990, 29990, 34990, 39990, 49990];
    }
}
