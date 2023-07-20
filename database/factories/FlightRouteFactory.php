<?php

namespace Database\Factories;

use App\Models\FlightRoute;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FlightRoute>
 */
class FlightRouteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $places = FlightRoute::$place;

        shuffle($places);

        return [
            'place_start' => array_shift($places),
            'place_end' => array_shift($places),
        ];
    }
}
