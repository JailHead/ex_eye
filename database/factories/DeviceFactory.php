<?php

namespace Database\Factories;

use App\Models\Device;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Device>
 */
class DeviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomUserId = User::inRandomOrder()->first()->id;

        return [
            'user_id' => $randomUserId,
            'name' => $this->faker->text(),
            'type' => $this->faker->text(),
            'location' => $this->faker->text(),
            'active' => $this->faker->boolean(),
        ];
    }
}
