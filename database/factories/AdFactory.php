<?php

namespace Database\Factories;

use Exception;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Advertiser;
use Illuminate\Support\Collection;

use function PHPUnit\Framework\isEmpty;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ad>
 */
class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => fake()->randomElement(['free', 'paid']),
            'title' => fake()->sentence(),
            'description' => fake()->text(),
            'category_id' => Category::factory(),
            'advertiser_id' => Advertiser::factory(),
            'start_date' => Carbon::now()->addDays(rand(1, 7))->toDateString(),
        ];
    }

}
