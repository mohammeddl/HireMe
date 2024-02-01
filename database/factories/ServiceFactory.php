<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Service;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\service>
 */
class ServiceFactory extends Factory
{
    protected $model = Service::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => $this->faker->sentence,
            'title' => $this->faker->word,
            'date' => $this->faker->date,
            // 'category_id' should be assigned based on existing categories, adjust as needed
            'category_id' => random_int(1, 4), // Adjust the range based on your categories
        ];
    }
}
