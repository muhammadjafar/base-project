<?php

namespace Database\Seeders;

use App\Models\Example\Example;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Schema;

class ExampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Example::truncate();
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 15; $i++) {
            Example::create([
                'name' => $faker->name,
                'job' => $faker->jobTitle,
                'age' => $faker->numberBetween(25, 40),
                'address' => $faker->address,
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
