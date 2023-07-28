<?php

namespace Database\Factories;

use App\Models\FlightRoute;
use App\Models\Plane;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flight>
 */
class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'class_business' => fake()->randomElement([30,25,10,35]),
            'class_economy' => fake()->randomElement([100,60,80,90]),
            'flight_time_total' => fake()->randomElement(['1h20p','3h20p','1h45p','3h']),
            'flight_date' => fake()->date('2023-07-23'),
            'flight_time_start' => fake()->time('H:i:s'),
            'flight_route_id' => rand(1, 400),
            'plane_id' => rand(10, 20)
        ];
    }
}
