<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dictionary>
 */
class DictionaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'state' => $this->faker->state(),
            'place' => $this->faker->streetName(),
            'city' => $this->faker->city(),
            'name' => $this->faker->name(),
            'active_years' => random_int(0, 100),
            'type_person' => $this->faker->randomElement(['No aplica', 'Preferente']),
            'type_position' => $this->faker->randomElement(['Político', 'Actor', 'Cantante', 'Otro'])
        ];
    }
}
