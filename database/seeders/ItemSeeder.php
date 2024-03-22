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
    // open file and read keys from first line
    $file = fopen(__DIR__ . "/../csv/items.csv", "r");
    $keys = fgetcsv($file);

    // read all csv line
    while ($item_data = fgetcsv($file)) {

      // check if line is empty
      $empty_line = true;
      foreach ($item_data as $data) {
        if ($data)
          $empty_line = false;
      }

      // gen and fill new item if not empty line
      if (!$empty_line) {
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
}
