<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
            'book_name'=>$this->faker->name,
            'user_id'=>1,
            'book_writer'=>$this->faker->name,
            'book_price'=>$this->faker->randomFloat(100,500),
            'book_image'=>$this->faker->imageUrl()
        ];
    }
}
