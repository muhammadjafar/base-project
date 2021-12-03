<?php

namespace Database\Seeders;

use App\Models\Example;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ExampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 15; $i++) {
            Example::create([
                'name' => $faker->name,
                'job' => $faker->jobTitle,
                'age' => $faker->numberBetween(25, 40),
                'address' => $faker->address
            ]);
        }
    }
}
