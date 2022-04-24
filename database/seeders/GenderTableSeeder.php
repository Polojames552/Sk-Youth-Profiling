<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gender;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gen = new Gender();
        $gen->gender_name = "Male";
        $gen->save();

        $gen = new Gender();
        $gen->gender_name = "Female";
        $gen->save();

        $gen = new Gender();
        $gen->gender_name = "LGBT";
        $gen->save();
    }
}
