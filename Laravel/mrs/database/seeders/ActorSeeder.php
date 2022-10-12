<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\Actor;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $i = 1;
        while ($i <= 50) {
            $name = $faker->name;
            Actor::create([
                'name' => $name,
                'slug' => Str::slug($name)
            ]);
            $i++;
        }
    }
}
