<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\inventory;
use Faker\Factory as faker;
use PhpParser\Node\Expr\Cast\Int_;

class inventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//      Dummy Data (10 Rows)
        for ($i=1;$i<=10;$i++){
            $faker = faker::create();
            $inventory = new inventory();
            $inventory->name = $faker->name;
            $inventory->quantity = 22;
            $inventory->price = 100;
            $inventory->category = Str::random(4);
            $inventory->save();
        }

    }
}
