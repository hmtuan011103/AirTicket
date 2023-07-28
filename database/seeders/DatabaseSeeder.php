<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\Airline;
use App\Models\Flight;
use App\Models\FlightRoute;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        $data = [
//            [
//                'name' => 'Ngoc Manh',
//                'email' => 'admin5@gmail.com',
//                'password' => bcrypt(123456), // password
//                'role' => 1,
//            ],
//        ];
//
//        DB::table('admins')->insert($data);
//        FlightRoute::factory(484)->create();
//
//        $dataAirlines = Airline::all();
//        for($i = 0; $i < 20;  $i++){
//             \App\Models\Plane::factory()->create([
//                 'airline_id' => $dataAirlines->random()->id,
//             ]);
//        }
//        Flight::factory(40)->create();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
