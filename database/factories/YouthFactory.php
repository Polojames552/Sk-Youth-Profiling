<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Intger;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Youth>
 */
class YouthFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {

        $sex = array("Male", "Female", "LGBT");
        shuffle($sex);
        $sex = $sex[array_rand($sex)];

        $CPno = array("09103245513","09703644522");
        shuffle($CPno);
        $CPno = $CPno[array_rand($CPno)];

        $Educ = array("Master's Degree", "College Level","College Undergraduate","Senior High School", "Junior High School","High School Undergraduate", "Elementary Level","Elementary Undergraduate");
        shuffle($Educ);
        $Educ = $Educ[array_rand($Educ)];

        $purok = array("1", "2","3", "4-A","4-B","5","6");
        shuffle($purok);
        $purok = $purok[array_rand($purok)];

        $PWD = array("Yes", "No");
        shuffle($PWD);
        $PWD = $PWD[array_rand($PWD)];

        $Civil = array("Single", "Married" , "Widowed");
        shuffle($Civil);
        $Civil = $Civil[array_rand($Civil)];

        $scholar = array("None", "Scholar");
        shuffle($scholar);
        $scholar = $scholar[array_rand($scholar)];

        $occup = array("Laborer", "Vendor","Mason","Student", "");
        shuffle($occup);
        $occup = $occup[array_rand($occup)];

        $s1 = array("Basketball", "Badminton","Taekwondo","Sepak Takraw", "");
        shuffle($s1);
        $s1 = $s1[array_rand($s1)];

        $s2 = array("Running", "Volleyball","Cycling", "");
        shuffle($s2);
        $s2 = $s2[array_rand($s2)];

        $s3 = array("Esport", "");
        shuffle($s3);
        $s3 = $s3[array_rand($s3)];

        $age = rand(15,26);
        return [
             'Fname'=> $this->faker->name(),
             'Mname'=> $this->faker->name(),
             'Lname'=> $this->faker->name(),
             'EXTname'=> $this->faker->name(),
             'Bday'=> $this->faker->date(),
             'Age'=> $age,
             'Sex'=> $sex,
             'parent'=> $this->faker->name(),
             'CPno'=> $CPno,
             'EducStatus'=> $Educ,
             'Purok'=> $purok,
             'PWD'=> $PWD,
             'CivilStatus'=> $Civil,
             'Scholarship'=> $scholar,
             'Occupation'=>  $occup,
             'Sports1'=>$s1,
             'Sports2'=> $s2,
             'Sports3'=> $s3,
        ];
    }
}
