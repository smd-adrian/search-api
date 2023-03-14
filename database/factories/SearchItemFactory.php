<?php

namespace Database\Factories;

use App\Models\Search;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SearchItem>
 */
class SearchItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        return [
            'search_id' => Search::all()->random()->id,
            'percentage' => random_int(0, 100),
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
