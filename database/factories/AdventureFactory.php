<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Adventure>
 */
class AdventureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imageUrls = [
            'https://images.pexels.com/photos/758744/pexels-photo-758744.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            'https://images.pexels.com/photos/1659437/pexels-photo-1659437.jpeg',
            'https://images.pexels.com/photos/1365425/pexels-photo-1365425.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            'https://images.pexels.com/photos/705075/pexels-photo-705075.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            'https://images.pexels.com/photos/2398220/pexels-photo-2398220.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
        ];

        return [
            'title' => fake()->sentence,
            'description' => fake()->paragraph,
            'location' => fake()->city,
            'date' => Carbon::now()->addDays(rand(1, 365)),
            'duration' => fake()->numberBetween(30, 240),
            'capacity' => fake()->numberBetween(5, 20),
            'image_url' => $imageUrls[array_rand($imageUrls)],
            'user_id' => User::factory(),
        ];
    }
}
