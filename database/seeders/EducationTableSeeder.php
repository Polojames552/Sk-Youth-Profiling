<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Education;

class EducationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $educ = new Education();
        $educ->EducStatus = "Master's degree";
        $educ->save();

        $educ = new Education();
        $educ->EducStatus = "College Level";
        $educ->save();

        $educ = new Education();
        $educ->EducStatus = "College Undergraduate";
        $educ->save();

        $educ = new Education();
        $educ->EducStatus = "Senior High School";
        $educ->save();

        $educ = new Education();
        $educ->EducStatus = "Junior High School";
        $educ->save();

        $educ = new Education();
        $educ->EducStatus = "High School Undergraduate";
        $educ->save();

        $educ = new Education();
        $educ->EducStatus = "Elementary Level";
        $educ->save();

        $educ = new Education();
        $educ->EducStatus = "Elementary Undergraduate";
        $educ->save();

    }
}
