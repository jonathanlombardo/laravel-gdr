<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Vite;

class TypeSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $file = fopen(__DIR__ . "/../csv/types.csv", "r");
    $keys = fgetcsv($file);



    while ($type_data = fgetcsv($file)) {

      $type = new Type;
      $type->name = $type_data[0];
      $type->image = Vite::asset("resources/$type_data[1]");
      $type->description = $type_data[2];

      $type->save();


    }
  }
}
