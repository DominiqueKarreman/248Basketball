<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Veld>
 */
class VeldFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'longitude' => $this->faker->longitude,
            'latitude' => $this->faker->latitude,
            'naam' => $this->faker->name,
            'adres' => $this->faker->address,
            'postcode' => $this->faker->postcode,
            'plaats' => $this->faker->city,
            'capaciteit' => $this->faker->numberBetween(1, 100),
            'aantal_baskets' => $this->faker->numberBetween(1, 10),
            'verlichting' => $this->faker->boolean,
            'competitie' => $this->faker->boolean,
            'openingstijden' => $this->faker->time(),
            'sluitingstijden' => $this->faker->time(),
            'veld_leider' => function () {
                return User::factory()->create()->id;
            },
            'aantal_bezoekers' => $this->faker->numberBetween(1, 100),
            'conditie' => $this->faker->text,
            'is_active' => $this->faker->boolean,
            'img_url' => $this->faker->imageUrl(),
        ];
    }
}
