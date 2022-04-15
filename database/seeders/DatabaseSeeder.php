<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gender;
use App\Models\Education;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
          $this->call(GenderTableSeeder::class);
          $this->call(EducationTableSeeder::class);
          $this->call(PurokTableSeeder::class);
        // \App\Models\User::factory(10)->create();

        $user = new User();
        $user->name = "Lester Jay Rizalte";
        $user->email = "SkSanJulian@gmail.com";
        $user->password = Hash::make("SKSanJulian2022");
        $user->save();
    }
}
