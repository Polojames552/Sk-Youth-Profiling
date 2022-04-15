<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Purok;

class PurokTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $purok = new Purok();
        $purok->purok_name = "1";
        $purok->save();

        $purok = new Purok();
        $purok->purok_name = "2";
        $purok->save();

        $purok = new Purok();
        $purok->purok_name = "3";
        $purok->save();

        $purok = new Purok();
        $purok->purok_name = "4-A";
        $purok->save();

        $purok = new Purok();
        $purok->purok_name = "4-B";
        $purok->save();

        $purok = new Purok();
        $purok->purok_name = "5";
        $purok->save();

        $purok = new Purok();
        $purok->purok_name = "6";
        $purok->save();
    }
}
