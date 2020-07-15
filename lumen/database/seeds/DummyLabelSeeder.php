<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class DummyLabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 5; $i++) {
            DB::table('labels')->insert([
                'slug' => $faker->word,
                'name' => $faker->words(2, true)
            ]);
        }
    }
}
