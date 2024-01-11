<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\People;
use Faker\Factory as Faker;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 200; $i++) {
            People::create([
                'firstName' => $faker->firstName,
                'email' => $faker->unique()->safeEmail,
                'lastName' => $faker->lastName,
                'phoneNumber' => $faker->phoneNumber,
                'street' => $faker->streetAddress,
                'city' => $faker->city,
                'country' => $faker->country,
            ]);
        }
    }
}
