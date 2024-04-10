<?php

namespace Database\Seeders;

use App\Models\Characters;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigCharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = config('characters');
            foreach ($datas as $data){
                $character = new Characters;
                $character->fill($data);
                $character->save();
               
            } 
    

    }
}

