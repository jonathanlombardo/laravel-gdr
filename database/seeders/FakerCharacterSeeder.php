<?php

namespace Database\Seeders;

use App\Models\Character;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class FakerCharacterSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(Faker $faker)
  {
    for ($i = 0; $i < 10; $i++) {

      $character = new Character;

      $character->name = $faker->unique()->name();
      $character->description = $faker->text();
      $character->attack = $faker->randomNumber(3, false);
      $character->defence = $faker->randomNumber(3, false);
      $character->speed = $faker->randomNumber(3, false);
      $character->life = $faker->randomNumber(2, false);

      $character->save();
    }
  }
}
