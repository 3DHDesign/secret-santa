<?php

namespace Database\Seeders;

use App\Models\Player;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 100; $i++) {
            Player::create([
                'division_id' => $faker->numberBetween(1, 3),
                'full_name' => $faker->name,
                'number' => '+947' . $faker->unique()->randomNumber(8),
                'password' => bcrypt('123456789'),
            ]);
        }
    }
}
