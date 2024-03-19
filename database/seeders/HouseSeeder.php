<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\House;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class HouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10 ; $i++) { 
            $house = new House();

            $house->title = $faker->sentence(3);
            $house->description = $faker->text(30);
            $house->slug = Str::slug($house->title, '-');
            $house->img = $faker->imageUrl(640, 480, 'animals', true);
            $house->price = $faker->randomFloat(3, 50, 900);
            $house->type = $faker->word();

            $house->save();
        }
    }
}
