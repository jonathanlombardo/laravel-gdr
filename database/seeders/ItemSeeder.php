<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ItemSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $file = fopen(__DIR__ . "/../csv/items.csv", "r");

    $keys = fgetcsv($file);

    while ($item_data = fgetcsv($file)) {
      $item_data = fgetcsv($file);
      $item = new Item();
      foreach ($keys as $index => $key) {
        if (Schema::hasColumn("items", $key)) {
          $item->$key = $item_data[$index];
        }
      }
      $item->save();
    }
  }
}
