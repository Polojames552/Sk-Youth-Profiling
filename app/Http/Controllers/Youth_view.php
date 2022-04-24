<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Youth;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\ValidationException;
use App\Models\YouthPrint;
use Illuminate\Support\Str;

use DB;

class Youth_view extends Controller
{

    function show_welcome(){
        $announcement = DB::table('users')->get('announcement');
     
        return view('welcome',['announcement'=>$announcement]);
    }


    function show(){
        $youth = DB::table('youths')->get();
        $count = DB::table('youths')->count();
        
    // Population per purok
    $purok1 = DB::table('youths')->where('Purok', '1')->count();
    $purok2 = DB::table('youths')->where('Purok', '2')->count();
    $purok3 = DB::table('youths')->where('Purok', '3')->count();
    $purok4A = DB::table('youths')->where('Purok', '4-A')->count();
    $purok4B = DB::table('youths')->where('Purok', '4-B')->count();
    $purok5 = DB::table('youths')->where('Purok', '5')->count();
    $purok6 = DB::table('youths')->where('Purok', '6')->count();

    // PIE Boys and Girls
    $Male = DB::table('youths')->where('Sex', 'Male')->count();
    if($Male == 0){
        $FMale = 0;
    }else{
        $FMale = ($count/$Male)*100;
    }

    $Female = DB::table('youths')->where('Sex', 'Female')->count();
    if($Female == 0){
        $FFemale = 0;
    }else{
        $FFemale = ($count/$Female)*100;
    }

    $LGBTQ = DB::table('youths')->where('Sex', 'LGBT')->count();
    if($LGBTQ == 0){
        $LGBTQ = 0;
    }else{
        $LGBTQ = ($count/$LGBTQ)*100;
    }

        return view('dashboardmain',['youth'=>$youth,'purok1'=>$purok1,
        'purok2'=>$purok2,'purok3'=>$purok3,'purok4A'=>$purok4A,'purok4B'=>$purok4B,'purok5'=>$purok5,'purok6'=>$purok6,'FMale'=>$FMale,
        'FFemale'=>$FFemale,'LGBTQ'=>$LGBTQ , 'count'=>$count]);
    }

    function data1(){
        $educ = DB::table('education')->get();
        $purok = DB::table('puroks')->get();
        $p1 = "";
        $youth = DB::table('youths')->get();
     
        $num1 = YouthPrint::query()->count();
        if($num1!=0){
            YouthPrint::truncate();
        }
        return view('tables',['num1'=>$num1,'youth'=>$youth,'educ'=>$educ,'purok'=>$purok,'p1'=>$p1]);
    }
     function data2(){
        $educ = DB::table('education')->get();
        $purok = DB::table('puroks')->get();
        
        return view('SKform',['educ'=>$educ,'purok'=>$purok]);
    }

    function tables(){
        $count = DB::table('youths')->count();

        // PIE AGE RATIO
    
        $N15To18 = DB::table('youths')->where('Age', '15')->Orwhere('Age', '16')->Orwhere('Age', '17')->Orwhere('Age', '18')->count();
        if($N15To18 == 0){
            $F15to18 = 0;
        }else{
            $F15to18 = ($count/$N15To18)*100;
        }

        $N19Above = DB::table('youths')->where('Age', '19')->Orwhere('Age', '20')->Orwhere('Age', '21')->Orwhere('Age', '22')->Orwhere('Age', '23')->Orwhere('Age', '24')->Orwhere('Age', '25')->Orwhere('Age', '26')->Orwhere('Age', '27')->Orwhere('Age', '28')->count();
        if($N19Above == 0){
            $F19Above = 0;
        }else{
            $F19Above = ($count/$N19Above)*100;
        }

      // Population per purok
      $purok1 = DB::table('youths')->where('Purok', '1')->count();
      $purok2 = DB::table('youths')->where('Purok', '2')->count();
      $purok3 = DB::table('youths')->where('Purok', '3')->count();
      $purok4A = DB::table('youths')->where('Purok', '4-A')->count();
      $purok4B = DB::table('youths')->where('Purok', '4-B')->count();
      $purok5 = DB::table('youths')->where('Purok', '5')->count();
      $purok6 = DB::table('youths')->where('Purok', '6')->count();

       // PIE Boys and Girls
       $Male = DB::table('youths')->where('Sex', 'Male')->count();
        if($Male == 0){
            $FMale = 0;
        }else{
            $FMale = ($count/$Male)*100;
        }

        $Female = DB::table('youths')->where('Sex', 'Female')->count();
        if($Female == 0){
            $FFemale = 0;
        }else{
            $FFemale = ($count/$Female)*100;
        }

        $LGBTQ = DB::table('youths')->where('Sex', 'LGBT')->count();
        if($LGBTQ == 0){
            $LGBTQ = 0;
        }else{
            $LGBTQ = ($count/$LGBTQ)*100;
        }

        // Population per Education levels
        $announcement = DB::table('users')->get('announcement');
        $master = DB::table('youths')->where('EducStatus', "Master's Degree")->count();
        $cl = DB::table('youths')->where('EducStatus', "College Level")->count();
        $cu = DB::table('youths')->where('EducStatus', "College Undergraduate")->count();
        $shs = DB::table('youths')->where('EducStatus', "Senior High School")->count();
        $jhs = DB::table('youths')->where('EducStatus', "Junior High School")->count();
        $hsu = DB::table('youths')->where('EducStatus', "High School Undergraduate")->count();
        $el = DB::table('youths')->where('EducStatus', "Elementary Level")->count();
        $eu = DB::table('youths')->where('EducStatus', "Elementary Undergraduate")->count();
      

        return view('charts',['announcement' => $announcement,'count'=> $count , 'F15to18'=>$F15to18,'F19Above'=>$F19Above,'purok1'=>$purok1,
        'purok2'=>$purok2,'purok3'=>$purok3,'purok4A'=>$purok4A,'purok4B'=>$purok4B,'purok5'=>$purok5,'purok6'=>$purok6,'FMale'=>$FMale,
        'FFemale'=>$FFemale,'LGBTQ'=>$LGBTQ,'master'=>$master,'cl'=>$cl,'cu'=>$cu,'shs'=>$shs,'jhs'=>$jhs, 'hsu'=>$hsu,'el'=>$el,'eu'=>$eu]);
    }

    public function search(Request $request){
        // Get the search value from the request
        $purok = $request->input('purok');
        $sex = $request->input('sex');
        $education = $request->input('education');
        $scholar = $request->input('scholars');
        $age = $request->input('age');
        

        if($purok == "" && $sex == "" && $education == ""  && $scholar == "" && $age == ""){
            $youth = DB::table('youths')->get();
            $educ = DB::table('education')->get();
            $purok = DB::table('puroks')->get();
            $p1 = "";
          
            $num1 = YouthPrint::query()->count(); 
                  if($num1!=0){
                    YouthPrint::truncate();  
                  }

                  foreach($youth as $youth1){
                    $data = new YouthPrint();
                    // $data->Fname = $youth1->Fname;
                    $data->FullName = $youth1->Lname.", ". $youth1->Fname . " " .substr($youth1->Mname, 0, 1 ).". ".$youth1->EXTname;
                    // $data->Mname = substr($youth1->Mname, 0, 1);
                    // $data->Lname = $youth1->Lname;
                    // $data->EXTname = $youth1->EXTname;
                    $data->Bday = $youth1->Bday;
                    $data->Age = $youth1->Age;
                    $data->Sex = $youth1->Sex;
                    $data->parent = $youth1->parent;
                    $data->CPno = $youth1->CPno;
                    $data->EducStatus = $youth1->EducStatus;
                    $data->Purok = $youth1->Purok;
                    $data->PWD = $youth1->PWD;
                    $data->CivilStatus = $youth1->CivilStatus;
                    $data->Scholarship = $youth1->Scholarship;
                    $data->Occupation = $youth1->Occupation;
                    $data->Sports1 = $youth1->Sports1;
                    $data->Sports2 = $youth1->Sports2;
                    $data->Sports3 = $youth1->Sports3;
                    
                      $data->save();
                  }
            
           return view('tables',['num1'=>$num1,'youth'=>$youth,'educ'=>$educ,'purok'=>$purok,'p1'=>$p1]);
        }
        else{
            // 10000
            if($purok != "" && $sex == "" && $education == ""  && $scholar == "" && $age == ""){
                $youth = DB::table('youths')->where('Purok', $purok)->get();  
                $educ = DB::table('education')->get();
                $purok = DB::table('puroks')->get();
                $p1 = "";
                
                $num1 = YouthPrint::query()->count(); 
                  if($num1!=0){
                    YouthPrint::truncate();  
                  }

                  foreach($youth as $youth1){
                    $data = new YouthPrint();
                    
                    
                     $data->FullName = $youth1->Lname.", ". $youth1->Fname . " " .substr($youth1->Mname, 0, 1 ).". ".$youth1->EXTname;
                    
                    $data->Bday = $youth1->Bday;
                    $data->Age = $youth1->Age;
                    $data->Sex = $youth1->Sex;
                    $data->parent = $youth1->parent;
                    $data->CPno = $youth1->CPno;
                    $data->EducStatus = $youth1->EducStatus;
                    $data->Purok = $youth1->Purok;
                    $data->PWD = $youth1->PWD;
                    $data->CivilStatus = $youth1->CivilStatus;
                    $data->Scholarship = $youth1->Scholarship;
                    $data->Occupation = $youth1->Occupation;
                    $data->Sports1 = $youth1->Sports1;
                    $data->Sports2 = $youth1->Sports2;
                    $data->Sports3 = $youth1->Sports3;
                    
                      $data->save();
                  }

               
                  
               return view('tables',['num1'=>$num1,'youth'=>$youth,'educ'=>$educ,'purok'=>$purok,'p1'=>$p1]);
                
            }
             // 11000
            if($purok != "" && $sex != "" && $education == ""  && $scholar == "" && $age == ""){
                $youth = DB::table('youths')->where('Purok', $purok)
                ->where('Sex', $sex)
                ->get(); 
                $educ = DB::table('education')->get();
                $purok = DB::table('puroks')->get();
                $p1 = "";

                $num1 = YouthPrint::query()->count(); 
                if($num1!=0){
                  YouthPrint::truncate();  
                }

                foreach($youth as $youth1){
                  $data = new YouthPrint();
                  
                  
                   $data->FullName = $youth1->Lname.", ". $youth1->Fname . " " .substr($youth1->Mname, 0, 1 ).". ".$youth1->EXTname;
                  
                  $data->Bday = $youth1->Bday;
                  $data->Age = $youth1->Age;
                  $data->Sex = $youth1->Sex;
                  $data->parent = $youth1->parent;
                  $data->CPno = $youth1->CPno;
                  $data->EducStatus = $youth1->EducStatus;
                  $data->Purok = $youth1->Purok;
                  $data->PWD = $youth1->PWD;
                  $data->CivilStatus = $youth1->CivilStatus;
                  $data->Scholarship = $youth1->Scholarship;
                  $data->Occupation = $youth1->Occupation;
                  $data->Sports1 = $youth1->Sports1;
                  $data->Sports2 = $youth1->Sports2;
                  $data->Sports3 = $youth1->Sports3;
                  
                    $data->save();
                }
               return view('tables',['num1'=>$num1,'youth'=>$youth,'educ'=>$educ,'purok'=>$purok,'p1'=>$p1]);
            }
             // 11100
            if($purok != "" && $sex != "" && $education != ""  && $scholar == "" && $age == ""){
                $youth = DB::table('youths')->where('Purok', $purok)
                ->where('Sex', $sex)
                ->where('EducStatus', $education)
                ->get(); 
                $educ = DB::table('education')->get();
                $purok = DB::table('puroks')->get();
                $p1 = "";

                $num1 = YouthPrint::query()->count(); 
                if($num1!=0){
                  YouthPrint::truncate();  
                }

                foreach($youth as $youth1){
                  $data = new YouthPrint();
                  
                  
                   $data->FullName = $youth1->Lname.", ". $youth1->Fname . " " .substr($youth1->Mname, 0, 1 ).". ".$youth1->EXTname;
                  
                  $data->Bday = $youth1->Bday;
                  $data->Age = $youth1->Age;
                  $data->Sex = $youth1->Sex;
                  $data->parent = $youth1->parent;
                  $data->CPno = $youth1->CPno;
                  $data->EducStatus = $youth1->EducStatus;
                  $data->Purok = $youth1->Purok;
                  $data->PWD = $youth1->PWD;
                  $data->CivilStatus = $youth1->CivilStatus;
                  $data->Scholarship = $youth1->Scholarship;
                  $data->Occupation = $youth1->Occupation;
                  $data->Sports1 = $youth1->Sports1;
                  $data->Sports2 = $youth1->Sports2;
                  $data->Sports3 = $youth1->Sports3;
                  
                    $data->save();
                }
               return view('tables',['num1'=>$num1,'youth'=>$youth,'educ'=>$educ,'purok'=>$purok,'p1'=>$p1]);
            }
             // 11110
            if($purok != "" && $sex != "" && $education != ""  && $scholar != "" && $age == ""){
                $youth = DB::table('youths')->where('Purok', $purok)
                ->where('Sex', $sex)
                ->where('EducStatus', $education)
                ->where('Scholarship', $scholar)
                ->get(); 
                $educ = DB::table('education')->get();
                $purok = DB::table('puroks')->get();
                $p1 = "";

                $num1 = YouthPrint::query()->count(); 
                if($num1!=0){
                  YouthPrint::truncate();  
                }

                foreach($youth as $youth1){
                  $data = new YouthPrint();
                  
                  
                  $data->FullName = $youth1->Lname.", ". $youth1->Fname . " " .substr($youth1->Mname, 0, 1 ).". ".$youth1->EXTname;
                  
                  $data->Bday = $youth1->Bday;
                  $data->Age = $youth1->Age;
                  $data->Sex = $youth1->Sex;
                  $data->parent = $youth1->parent;
                  $data->CPno = $youth1->CPno;
                  $data->EducStatus = $youth1->EducStatus;
                  $data->Purok = $youth1->Purok;
                  $data->PWD = $youth1->PWD;
                  $data->CivilStatus = $youth1->CivilStatus;
                  $data->Scholarship = $youth1->Scholarship;
                  $data->Occupation = $youth1->Occupation;
                  $data->Sports1 = $youth1->Sports1;
                  $data->Sports2 = $youth1->Sports2;
                  $data->Sports3 = $youth1->Sports3;
                  
                    $data->save();
                }
               return view('tables',['num1'=>$num1,'youth'=>$youth,'educ'=>$educ,'purok'=>$purok,'p1'=>$p1]);
            }
             // 11111
            if($purok != "" && $sex != "" && $education != ""  && $scholar != "" && $age != ""){
                $youth = DB::table('youths')->where('Purok', $purok)
                ->where('Sex', $sex)
                ->where('EducStatus', $education)
                ->where('Scholarship', $scholar)
                ->where('Age', $age)
                ->get(); 
                $educ = DB::table('education')->get();
                $purok = DB::table('puroks')->get();
                $p1 = "";

                $num1 = YouthPrint::query()->count(); 
                if($num1!=0){
                  YouthPrint::truncate();  
                }

                foreach($youth as $youth1){
                  $data = new YouthPrint();
                  
                  
                   $data->FullName = $youth1->Lname.", ". $youth1->Fname . " " .substr($youth1->Mname, 0, 1 ).". ".$youth1->EXTname;
                  
                  $data->Bday = $youth1->Bday;
                  $data->Age = $youth1->Age;
                  $data->Sex = $youth1->Sex;
                  $data->parent = $youth1->parent;
                  $data->CPno = $youth1->CPno;
                  $data->EducStatus = $youth1->EducStatus;
                  $data->Purok = $youth1->Purok;
                  $data->PWD = $youth1->PWD;
                  $data->CivilStatus = $youth1->CivilStatus;
                  $data->Scholarship = $youth1->Scholarship;
                  $data->Occupation = $youth1->Occupation;
                  $data->Sports1 = $youth1->Sports1;
                  $data->Sports2 = $youth1->Sports2;
                  $data->Sports3 = $youth1->Sports3;
                  
                    $data->save();
                }
               return view('tables',['num1'=>$num1,'youth'=>$youth,'educ'=>$educ,'purok'=>$purok,'p1'=>$p1]);
            }
              // 11010
              if($purok != "" && $sex != "" && $education == ""  && $scholar != "" && $age == ""){
                $youth = DB::table('youths')->where('Purok', $purok)
                ->where('Sex', $sex)
                ->where('Scholarship', $scholar)
                ->get(); 
                $educ = DB::table('education')->get();
                $purok = DB::table('puroks')->get();
                $p1 = "";

                $num1 = YouthPrint::query()->count(); 
                if($num1!=0){
                  YouthPrint::truncate();  
                }

                foreach($youth as $youth1){
                  $data = new YouthPrint();
                  
                  
                   $data->FullName = $youth1->Lname.", ". $youth1->Fname . " " .substr($youth1->Mname, 0, 1 ).". ".$youth1->EXTname;
                  
                  $data->Bday = $youth1->Bday;
                  $data->Age = $youth1->Age;
                  $data->Sex = $youth1->Sex;
                  $data->parent = $youth1->parent;
                  $data->CPno = $youth1->CPno;
                  $data->EducStatus = $youth1->EducStatus;
                  $data->Purok = $youth1->Purok;
                  $data->PWD = $youth1->PWD;
                  $data->CivilStatus = $youth1->CivilStatus;
                  $data->Scholarship = $youth1->Scholarship;
                  $data->Occupation = $youth1->Occupation;
                  $data->Sports1 = $youth1->Sports1;
                  $data->Sports2 = $youth1->Sports2;
                  $data->Sports3 = $youth1->Sports3;
                  
                    $data->save();
                }
               return view('tables',['num1'=>$num1,'youth'=>$youth,'educ'=>$educ,'purok'=>$purok,'p1'=>$p1]);
            }
              // 11011
              if($purok != "" && $sex != "" && $education == ""  && $scholar != "" && $age == ""){
                $youth = DB::table('youths')->where('Purok', $purok)
                ->where('Sex', $sex)
                ->where('Scholarship', $scholar)
                ->where('Age', $age)
                ->get(); 
                $educ = DB::table('education')->get();
                $purok = DB::table('puroks')->get();
                $p1 = "";

                $num1 = YouthPrint::query()->count(); 
                if($num1!=0){
                  YouthPrint::truncate();  
                }

                foreach($youth as $youth1){
                  $data = new YouthPrint();
                  
                  
                   $data->FullName = $youth1->Lname.", ". $youth1->Fname . " " .substr($youth1->Mname, 0, 1 ).". ".$youth1->EXTname;
                  
                  $data->Bday = $youth1->Bday;
                  $data->Age = $youth1->Age;
                  $data->Sex = $youth1->Sex;
                  $data->parent = $youth1->parent;
                  $data->CPno = $youth1->CPno;
                  $data->EducStatus = $youth1->EducStatus;
                  $data->Purok = $youth1->Purok;
                  $data->PWD = $youth1->PWD;
                  $data->CivilStatus = $youth1->CivilStatus;
                  $data->Scholarship = $youth1->Scholarship;
                  $data->Occupation = $youth1->Occupation;
                  $data->Sports1 = $youth1->Sports1;
                  $data->Sports2 = $youth1->Sports2;
                  $data->Sports3 = $youth1->Sports3;
                  
                    $data->save();
                }
               return view('tables',['num1'=>$num1,'youth'=>$youth,'educ'=>$educ,'purok'=>$purok,'p1'=>$p1]);
            }
            // 11001
            if($purok != "" && $sex != "" && $education == ""  && $scholar == "" && $age != ""){
                $youth = DB::table('youths')->where('Purok', $purok)
                ->where('Sex', $sex)
                ->where('Age', $age)
                ->get(); 
                $educ = DB::table('education')->get();
                $purok = DB::table('puroks')->get();
                $p1 = "";

                $num1 = YouthPrint::query()->count(); 
                if($num1!=0){
                  YouthPrint::truncate();  
                }

                foreach($youth as $youth1){
                  $data = new YouthPrint();
                  
                  
                   $data->FullName = $youth1->Lname.", ". $youth1->Fname . " " .substr($youth1->Mname, 0, 1 ).". ".$youth1->EXTname;
                  
                  $data->Bday = $youth1->Bday;
                  $data->Age = $youth1->Age;
                  $data->Sex = $youth1->Sex;
                  $data->parent = $youth1->parent;
                  $data->CPno = $youth1->CPno;
                  $data->EducStatus = $youth1->EducStatus;
                  $data->Purok = $youth1->Purok;
                  $data->PWD = $youth1->PWD;
                  $data->CivilStatus = $youth1->CivilStatus;
                  $data->Scholarship = $youth1->Scholarship;
                  $data->Occupation = $youth1->Occupation;
                  $data->Sports1 = $youth1->Sports1;
                  $data->Sports2 = $youth1->Sports2;
                  $data->Sports3 = $youth1->Sports3;
                  
                    $data->save();
                }
               return view('tables',['num1'=>$num1,'youth'=>$youth,'educ'=>$educ,'purok'=>$purok,'p1'=>$p1]);
            }
             // 10100
            if($purok != "" && $sex == "" && $education != ""  && $scholar == "" && $age == ""){
                $youth = DB::table('youths')->where('Purok', $purok)
                ->where('EducStatus', $education)
                ->get(); 
                $educ = DB::table('education')->get();
                $purok = DB::table('puroks')->get();
                $p1 = "";

                $num1 = YouthPrint::query()->count(); 
                if($num1!=0){
                  YouthPrint::truncate();  
                }

                foreach($youth as $youth1){
                  $data = new YouthPrint();
                  
                  
                   $data->FullName = $youth1->Lname.", ". $youth1->Fname . " " .substr($youth1->Mname, 0, 1 ).". ".$youth1->EXTname;
                  
                  $data->Bday = $youth1->Bday;
                  $data->Age = $youth1->Age;
                  $data->Sex = $youth1->Sex;
                  $data->parent = $youth1->parent;
                  $data->CPno = $youth1->CPno;
                  $data->EducStatus = $youth1->EducStatus;
                  $data->Purok = $youth1->Purok;
                  $data->PWD = $youth1->PWD;
                  $data->CivilStatus = $youth1->CivilStatus;
                  $data->Scholarship = $youth1->Scholarship;
                  $data->Occupation = $youth1->Occupation;
                  $data->Sports1 = $youth1->Sports1;
                  $data->Sports2 = $youth1->Sports2;
                  $data->Sports3 = $youth1->Sports3;
                  
                    $data->save();
                }
               return view('tables',['num1'=>$num1,'youth'=>$youth,'educ'=>$educ,'purok'=>$purok,'p1'=>$p1]);
            }
              // 10101
              if($purok != "" && $sex == "" && $education != ""  && $scholar == "" && $age != ""){
                $youth = DB::table('youths')->where('Purok', $purok)
                ->where('EducStatus', $education)
                ->where('Age', $age)
                ->get(); 
                $educ = DB::table('education')->get();
                $purok = DB::table('puroks')->get();
                $p1 = "";

                $num1 = YouthPrint::query()->count(); 
                if($num1!=0){
                  YouthPrint::truncate();  
                }

                foreach($youth as $youth1){
                  $data = new YouthPrint();
                  
                  
                   $data->FullName = $youth1->Lname.", ". $youth1->Fname . " " .substr($youth1->Mname, 0, 1 ).". ".$youth1->EXTname;
                  
                  $data->Bday = $youth1->Bday;
                  $data->Age = $youth1->Age;
                  $data->Sex = $youth1->Sex;
                  $data->parent = $youth1->parent;
                  $data->CPno = $youth1->CPno;
                  $data->EducStatus = $youth1->EducStatus;
                  $data->Purok = $youth1->Purok;
                  $data->PWD = $youth1->PWD;
                  $data->CivilStatus = $youth1->CivilStatus;
                  $data->Scholarship = $youth1->Scholarship;
                  $data->Occupation = $youth1->Occupation;
                  $data->Sports1 = $youth1->Sports1;
                  $data->Sports2 = $youth1->Sports2;
                  $data->Sports3 = $youth1->Sports3;
                  
                    $data->save();
                }
               return view('tables',['num1'=>$num1,'youth'=>$youth,'educ'=>$educ,'purok'=>$purok,'p1'=>$p1]);
            }
            // 10110
            if($purok != "" && $sex == "" && $education != ""  && $scholar != "" && $age == ""){
                $youth = DB::table('youths')->where('Purok', $purok)
                ->where('EducStatus', $education)
                ->where('Scholarship', $scholar)
                ->get(); 
                $educ = DB::table('education')->get();
                $purok = DB::table('puroks')->get();
                $p1 = "";

                $num1 = YouthPrint::query()->count(); 
                if($num1!=0){
                  YouthPrint::truncate();  
                }

                foreach($youth as $youth1){
                  $data = new YouthPrint();
                  
                  
                   $data->FullName = $youth1->Lname.", ". $youth1->Fname . " " .substr($youth1->Mname, 0, 1 ).". ".$youth1->EXTname;
                  
                  $data->Bday = $youth1->Bday;
                  $data->Age = $youth1->Age;
                  $data->Sex = $youth1->Sex;
                  $data->parent = $youth1->parent;
                  $data->CPno = $youth1->CPno;
                  $data->EducStatus = $youth1->EducStatus;
                  $data->Purok = $youth1->Purok;
                  $data->PWD = $youth1->PWD;
                  $data->CivilStatus = $youth1->CivilStatus;
                  $data->Scholarship = $youth1->Scholarship;
                  $data->Occupation = $youth1->Occupation;
                  $data->Sports1 = $youth1->Sports1;
                  $data->Sports2 = $youth1->Sports2;
                  $data->Sports3 = $youth1->Sports3;
                  
                    $data->save();
                }
               return view('tables',['num1'=>$num1,'youth'=>$youth,'educ'=>$educ,'purok'=>$purok,'p1'=>$p1]);
            }
            // 10111
            if($purok != "" && $sex == "" && $education != ""  && $scholar != "" && $age != ""){
                $youth = DB::table('youths')->where('Purok', $purok)
                ->where('EducStatus', $education)
                ->where('Scholarship', $scholar)
                ->where('Age', $age)
                ->get(); 
                $educ = DB::table('education')->get();
                $purok = DB::table('puroks')->get();
                $p1 = "";

                $num1 = YouthPrint::query()->count(); 
                if($num1!=0){
                  YouthPrint::truncate();  
                }

                foreach($youth as $youth1){
                  $data = new YouthPrint();
                  
                  
                   $data->FullName = $youth1->Lname.", ". $youth1->Fname . " " .substr($youth1->Mname, 0, 1 ).". ".$youth1->EXTname;
                  
                  $data->Bday = $youth1->Bday;
                  $data->Age = $youth1->Age;
                  $data->Sex = $youth1->Sex;
                  $data->parent = $youth1->parent;
                  $data->CPno = $youth1->CPno;
                  $data->EducStatus = $youth1->EducStatus;
                  $data->Purok = $youth1->Purok;
                  $data->PWD = $youth1->PWD;
                  $data->CivilStatus = $youth1->CivilStatus;
                  $data->Scholarship = $youth1->Scholarship;
                  $data->Occupation = $youth1->Occupation;
                  $data->Sports1 = $youth1->Sports1;
                  $data->Sports2 = $youth1->Sports2;
                  $data->Sports3 = $youth1->Sports3;
                  
                    $data->save();
                }
               return view('tables',['num1'=>$num1,'youth'=>$youth,'educ'=>$educ,'purok'=>$purok,'p1'=>$p1]);
            }
            // 10010
            if($purok != "" && $sex == "" && $education == ""  && $scholar != "" && $age == ""){
                $youth = DB::table('youths')->where('Purok', $purok)
                ->where('Scholarship', $scholar)
                ->get(); 
                $educ = DB::table('education')->get();
                $purok = DB::table('puroks')->get();
                $p1 = "";

                $num1 = YouthPrint::query()->count(); 
                if($num1!=0){
                  YouthPrint::truncate();  
                }

                foreach($youth as $youth1){
                  $data = new YouthPrint();
                  
                  
                   $data->FullName = $youth1->Lname.", ". $youth1->Fname . " " .substr($youth1->Mname, 0, 1 ).". ".$youth1->EXTname;
                  
                  $data->Bday = $youth1->Bday;
                  $data->Age = $youth1->Age;
                  $data->Sex = $youth1->Sex;
                  $data->parent = $youth1->parent;
                  $data->CPno = $youth1->CPno;
                  $data->EducStatus = $youth1->EducStatus;
                  $data->Purok = $youth1->Purok;
                  $data->PWD = $youth1->PWD;
                  $data->CivilStatus = $youth1->CivilStatus;
                  $data->Scholarship = $youth1->Scholarship;
                  $data->Occupation = $youth1->Occupation;
                  $data->Sports1 = $youth1->Sports1;
                  $data->Sports2 = $youth1->Sports2;
                  $data->Sports3 = $youth1->Sports3;
                  
                    $data->save();
                }
               return view('tables',['num1'=>$num1,'youth'=>$youth,'educ'=>$educ,'purok'=>$purok,'p1'=>$p1]);
            }
            // 10011
            if($purok != "" && $sex == "" && $education == ""  && $scholar != "" && $age != ""){
                $youth = DB::table('youths')->where('Purok', $purok)
                ->where('Scholarship', $scholar)
                ->where('Age', $age)
                ->get(); 
                $educ = DB::table('education')->get();
                $purok = DB::table('puroks')->get();
                $p1 = "";

                $num1 = YouthPrint::query()->count(); 
                if($num1!=0){
                  YouthPrint::truncate();  
                }

                foreach($youth as $youth1){
                  $data = new YouthPrint();
                  
                  
                   $data->FullName = $youth1->Lname.", ". $youth1->Fname . " " .substr($youth1->Mname, 0, 1 ).". ".$youth1->EXTname;
                  
                  $data->Bday = $youth1->Bday;
                  $data->Age = $youth1->Age;
                  $data->Sex = $youth1->Sex;
                  $data->parent = $youth1->parent;
                  $data->CPno = $youth1->CPno;
                  $data->EducStatus = $youth1->EducStatus;
                  $data->Purok = $youth1->Purok;
                  $data->PWD = $youth1->PWD;
                  $data->CivilStatus = $youth1->CivilStatus;
                  $data->Scholarship = $youth1->Scholarship;
                  $data->Occupation = $youth1->Occupation;
                  $data->Sports1 = $youth1->Sports1;
                  $data->Sports2 = $youth1->Sports2;
                  $data->Sports3 = $youth1->Sports3;
                  
                    $data->save();
                }
               return view('tables',['num1'=>$num1,'youth'=>$youth,'educ'=>$educ,'purok'=>$purok,'p1'=>$p1]);
            }
            // 10001
            if($purok != "" && $sex == "" && $education == ""  && $scholar == "" && $age != ""){
                $youth = DB::table('youths')->where('Purok', $purok)
                ->where('Age', $age)
                ->get(); 
                $educ = DB::table('education')->get();
                $purok = DB::table('puroks')->get();
                $p1 = "";

                $num1 = YouthPrint::query()->count(); 
                if($num1!=0){
                  YouthPrint::truncate();  
                }

                foreach($youth as $youth1){
                  $data = new YouthPrint();
                  
                  
                   $data->FullName = $youth1->Lname.", ". $youth1->Fname . " " .substr($youth1->Mname, 0, 1 ).". ".$youth1->EXTname;
                  
                  $data->Bday = $youth1->Bday;
                  $data->Age = $youth1->Age;
                  $data->Sex = $youth1->Sex;
                  $data->parent = $youth1->parent;
                  $data->CPno = $youth1->CPno;
                  $data->EducStatus = $youth1->EducStatus;
                  $data->Purok = $youth1->Purok;
                  $data->PWD = $youth1->PWD;
                  $data->CivilStatus = $youth1->CivilStatus;
                  $data->Scholarship = $youth1->Scholarship;
                  $data->Occupation = $youth1->Occupation;
                  $data->Sports1 = $youth1->Sports1;
                  $data->Sports2 = $youth1->Sports2;
                  $data->Sports3 = $youth1->Sports3;
                  
                    $data->save();
                }
               return view('tables',['num1'=>$num1,'youth'=>$youth,'educ'=>$educ,'purok'=>$purok,'p1'=>$p1]);
            }
             // 01000
             if($purok == "" && $sex != "" && $education == ""  && $scholar == "" && $age == ""){
                $youth = DB::table('youths')->where('Sex', $sex)
                ->get(); 
                $educ = DB::table('education')->get();
                $purok = DB::table('puroks')->get();
                $p1 = "";

                $num1 = YouthPrint::query()->count(); 
                if($num1!=0){
                  YouthPrint::truncate();  
                }

                foreach($youth as $youth1){
                  $data = new YouthPrint();
                  
                  
                   $data->FullName = $youth1->Lname.", ". $youth1->Fname . " " .substr($youth1->Mname, 0, 1 ).". ".$youth1->EXTname;
                  
                  $data->Bday = $youth1->Bday;
                  $data->Age = $youth1->Age;
                  $data->Sex = $youth1->Sex;
                  $data->parent = $youth1->parent;
                  $data->CPno = $youth1->CPno;
                  $data->EducStatus = $youth1->EducStatus;
                  $data->Purok = $youth1->Purok;
                  $data->PWD = $youth1->PWD;
                  $data->CivilStatus = $youth1->CivilStatus;
                  $data->Scholarship = $youth1->Scholarship;
                  $data->Occupation = $youth1->Occupation;
                  $data->Sports1 = $youth1->Sports1;
                  $data->Sports2 = $youth1->Sports2;
                  $data->Sports3 = $youth1->Sports3;
                  
                    $data->save();
                }
               return view('tables',['num1'=>$num1,'youth'=>$youth,'educ'=>$educ,'purok'=>$purok,'p1'=>$p1]);
            }
            // 01100
            if($purok == "" && $sex != "" && $education != ""  && $scholar == "" && $age == ""){
                $youth = DB::table('youths')->where('Sex', $sex)
                ->where('EducStatus', $education)
                ->get(); 
                $educ = DB::table('education')->get();
                $purok = DB::table('puroks')->get();
                $p1 = "";

                $num1 = YouthPrint::query()->count(); 
                if($num1!=0){
                  YouthPrint::truncate();  
                }

                foreach($youth as $youth1){
                  $data = new YouthPrint();
                  
                  
                   $data->FullName = $youth1->Lname.", ". $youth1->Fname . " " .substr($youth1->Mname, 0, 1 ).". ".$youth1->EXTname;
                  
                  $data->Bday = $youth1->Bday;
                  $data->Age = $youth1->Age;
                  $data->Sex = $youth1->Sex;
                  $data->parent = $youth1->parent;
                  $data->CPno = $youth1->CPno;
                  $data->EducStatus = $youth1->EducStatus;
                  $data->Purok = $youth1->Purok;
                  $data->PWD = $youth1->PWD;
                  $data->CivilStatus = $youth1->CivilStatus;
                  $data->Scholarship = $youth1->Scholarship;
                  $data->Occupation = $youth1->Occupation;
                  $data->Sports1 = $youth1->Sports1;
                  $data->Sports2 = $youth1->Sports2;
                  $data->Sports3 = $youth1->Sports3;
                  
                    $data->save();
                }
               return view('tables',['num1'=>$num1,'youth'=>$youth,'educ'=>$educ,'purok'=>$purok,'p1'=>$p1]);
            }
            // 01110
            if($purok == "" && $sex != "" && $education != ""  && $scholar != "" && $age == ""){
                $youth = DB::table('youths')->where('Sex', $sex)
                ->where('EducStatus', $education)
                ->where('Scholarship', $scholar)
                ->get(); 
                $educ = DB::table('education')->get();
                $purok = DB::table('puroks')->get();
                $p1 = "";

                $num1 = YouthPrint::query()->count(); 
                if($num1!=0){
                  YouthPrint::truncate();  
                }

                foreach($youth as $youth1){
                  $data = new YouthPrint();
                  
                  
                   $data->FullName = $youth1->Lname.", ". $youth1->Fname . " " .substr($youth1->Mname, 0, 1 ).". ".$youth1->EXTname;
                  
                  $data->Bday = $youth1->Bday;
                  $data->Age = $youth1->Age;
                  $data->Sex = $youth1->Sex;
                  $data->parent = $youth1->parent;
                  $data->CPno = $youth1->CPno;
                  $data->EducStatus = $youth1->EducStatus;
                  $data->Purok = $youth1->Purok;
                  $data->PWD = $youth1->PWD;
                  $data->CivilStatus = $youth1->CivilStatus;
                  $data->Scholarship = $youth1->Scholarship;
                  $data->Occupation = $youth1->Occupation;
                  $data->Sports1 = $youth1->Sports1;
                  $data->Sports2 = $youth1->Sports2;
                  $data->Sports3 = $youth1->Sports3;
                  
                    $data->save();
                }
               return view('tables',['num1'=>$num1,'youth'=>$youth,'educ'=>$educ,'purok'=>$purok,'p1'=>$p1]);
            }
            // 01111
            if($purok == "" && $sex != "" && $education != ""  && $scholar != "" && $age != ""){
                $youth = DB::table('youths')->where('Sex', $sex)
                ->where('EducStatus', $education)
                ->where('Scholarship', $scholar)
                ->where('Age', $age)
                ->get(); 
                $educ = DB::table('education')->get();
                $purok = DB::table('puroks')->get();
                $p1 = "";

                $num1 = YouthPrint::query()->count(); 
                if($num1!=0){
                  YouthPrint::truncate();  
                }

                foreach($youth as $youth1){
                  $data = new YouthPrint();
                  
                  
                   $data->FullName = $youth1->Lname.", ". $youth1->Fname . " " .substr($youth1->Mname, 0, 1 ).". ".$youth1->EXTname;
                  
                  $data->Bday = $youth1->Bday;
                  $data->Age = $youth1->Age;
                  $data->Sex = $youth1->Sex;
                  $data->parent = $youth1->parent;
                  $data->CPno = $youth1->CPno;
                  $data->EducStatus = $youth1->EducStatus;
                  $data->Purok = $youth1->Purok;
                  $data->PWD = $youth1->PWD;
                  $data->CivilStatus = $youth1->CivilStatus;
                  $data->Scholarship = $youth1->Scholarship;
                  $data->Occupation = $youth1->Occupation;
                  $data->Sports1 = $youth1->Sports1;
                  $data->Sports2 = $youth1->Sports2;
                  $data->Sports3 = $youth1->Sports3;
                  
                    $data->save();
                }
               return view('tables',['num1'=>$num1,'youth'=>$youth,'educ'=>$educ,'purok'=>$purok,'p1'=>$p1]);
            }
            // 01010
            if($purok == "" && $sex != "" && $education == ""  && $scholar != "" && $age == ""){
                $youth = DB::table('youths')->where('Sex', $sex)
                ->where('Scholarship', $scholar)
                ->get(); 
                $educ = DB::table('education')->get();
                $purok = DB::table('puroks')->get();
                $p1 = "";

                $num1 = YouthPrint::query()->count(); 
                if($num1!=0){
                  YouthPrint::truncate();  
                }

                foreach($youth as $youth1){
                  $data = new YouthPrint();
                  
                  
                   $data->FullName = $youth1->Lname.", ". $youth1->Fname . " " .substr($youth1->Mname, 0, 1 ).". ".$youth1->EXTname;
                  
                  $data->Bday = $youth1->Bday;
                  $data->Age = $youth1->Age;
                  $data->Sex = $youth1->Sex;
                  $data->parent = $youth1->parent;
                  $data->CPno = $youth1->CPno;
                  $data->EducStatus = $youth1->EducStatus;
                  $data->Purok = $youth1->Purok;
                  $data->PWD = $youth1->PWD;
                  $data->CivilStatus = $youth1->CivilStatus;
                  $data->Scholarship = $youth1->Scholarship;
                  $data->Occupation = $youth1->Occupation;
                  $data->Sports1 = $youth1->Sports1;
                  $data->Sports2 = $youth1->Sports2;
                  $data->Sports3 = $youth1->Sports3;
                  
                    $data->save();
                }
               return view('tables',['num1'=>$num1,'youth'=>$youth,'educ'=>$educ,'purok'=>$purok,'p1'=>$p1]);
            }
            // 01011
            if($purok == "" && $sex != "" && $education == ""  && $scholar != "" && $age != ""){
                $youth = DB::table('youths')->where('Sex', $sex)
                ->where('Scholarship', $scholar)
                ->where('Age', $age)
                ->get(); 
                $educ = DB::table('education')->get();
                $purok = DB::table('puroks')->get();
                $p1 = "";

                $num1 = YouthPrint::query()->count(); 
                if($num1!=0){
                  YouthPrint::truncate();  
                }

                foreach($youth as $youth1){
                  $data = new YouthPrint();
                  
                  
                   $data->FullName = $youth1->Lname.", ". $youth1->Fname . " " .substr($youth1->Mname, 0, 1 ).". ".$youth1->EXTname;
                  
                  $data->Bday = $youth1->Bday;
                  $data->Age = $youth1->Age;
                  $data->Sex = $youth1->Sex;
                  $data->parent = $youth1->parent;
                  $data->CPno = $youth1->CPno;
                  $data->EducStatus = $youth1->EducStatus;
                  $data->Purok = $youth1->Purok;
                  $data->PWD = $youth1->PWD;
                  $data->CivilStatus = $youth1->CivilStatus;
                  $data->Scholarship = $youth1->Scholarship;
                  $data->Occupation = $youth1->Occupation;
                  $data->Sports1 = $youth1->Sports1;
                  $data->Sports2 = $youth1->Sports2;
                  $data->Sports3 = $youth1->Sports3;
                  
                    $data->save();
                }
               return view('tables',['num1'=>$num1,'youth'=>$youth,'educ'=>$educ,'purok'=>$purok,'p1'=>$p1]);
            }
            // 01001
            if($purok == "" && $sex != "" && $education == ""  && $scholar == "" && $age != ""){
                $youth = DB::table('youths')->where('Sex', $sex)
                ->where('Age', $age)
                ->get(); 
                $educ = DB::table('education')->get();
                $purok = DB::table('puroks')->get();
                $p1 = "";

                $num1 = YouthPrint::query()->count(); 
                if($num1!=0){
                  YouthPrint::truncate();  
                }

                foreach($youth as $youth1){
                  $data = new YouthPrint();
                  
                  
                   $data->FullName = $youth1->Lname.", ". $youth1->Fname . " " .substr($youth1->Mname, 0, 1 ).". ".$youth1->EXTname;
                  
                  $data->Bday = $youth1->Bday;
                  $data->Age = $youth1->Age;
                  $data->Sex = $youth1->Sex;
                  $data->parent = $youth1->parent;
                  $data->CPno = $youth1->CPno;
                  $data->EducStatus = $youth1->EducStatus;
                  $data->Purok = $youth1->Purok;
                  $data->PWD = $youth1->PWD;
                  $data->CivilStatus = $youth1->CivilStatus;
                  $data->Scholarship = $youth1->Scholarship;
                  $data->Occupation = $youth1->Occupation;
                  $data->Sports1 = $youth1->Sports1;
                  $data->Sports2 = $youth1->Sports2;
                  $data->Sports3 = $youth1->Sports3;
                  
                    $data->save();
                }
               return view('tables',['num1'=>$num1,'youth'=>$youth,'educ'=>$educ,'purok'=>$purok,'p1'=>$p1]);
            }
            // 00100
            if($purok == "" && $sex == "" && $education != ""  && $scholar == "" && $age == ""){
                $youth = DB::table('youths')->where('EducStatus', $education)
                ->get(); 
                $educ = DB::table('education')->get();
                $purok = DB::table('puroks')->get();
                $p1 = "";

                $num1 = YouthPrint::query()->count(); 
                if($num1!=0){
                  YouthPrint::truncate();  
                }

                foreach($youth as $youth1){
                  $data = new YouthPrint();
                  
                  
                   $data->FullName = $youth1->Lname.", ". $youth1->Fname . " " .substr($youth1->Mname, 0, 1 ).". ".$youth1->EXTname;
                  
                  $data->Bday = $youth1->Bday;
                  $data->Age = $youth1->Age;
                  $data->Sex = $youth1->Sex;
                  $data->parent = $youth1->parent;
                  $data->CPno = $youth1->CPno;
                  $data->EducStatus = $youth1->EducStatus;
                  $data->Purok = $youth1->Purok;
                  $data->PWD = $youth1->PWD;
                  $data->CivilStatus = $youth1->CivilStatus;
                  $data->Scholarship = $youth1->Scholarship;
                  $data->Occupation = $youth1->Occupation;
                  $data->Sports1 = $youth1->Sports1;
                  $data->Sports2 = $youth1->Sports2;
                  $data->Sports3 = $youth1->Sports3;
                  
                    $data->save();
                }
               return view('tables',['num1'=>$num1,'youth'=>$youth,'educ'=>$educ,'purok'=>$purok,'p1'=>$p1]);
            }
            // 00110
            if($purok == "" && $sex == "" && $education != ""  && $scholar != "" && $age == ""){
                $youth = DB::table('youths')->where('EducStatus', $education)
                ->where('Scholarship', $scholar)
                ->get(); 
                $educ = DB::table('education')->get();
                $purok = DB::table('puroks')->get();
                $p1 = "";

                $num1 = YouthPrint::query()->count(); 
                if($num1!=0){
                  YouthPrint::truncate();  
                }

                foreach($youth as $youth1){
                  $data = new YouthPrint();
                  
                  
                   $data->FullName = $youth1->Lname.", ". $youth1->Fname . " " .substr($youth1->Mname, 0, 1 ).". ".$youth1->EXTname;
                  
                  $data->Bday = $youth1->Bday;
                  $data->Age = $youth1->Age;
                  $data->Sex = $youth1->Sex;
                  $data->parent = $youth1->parent;
                  $data->CPno = $youth1->CPno;
                  $data->EducStatus = $youth1->EducStatus;
                  $data->Purok = $youth1->Purok;
                  $data->PWD = $youth1->PWD;
                  $data->CivilStatus = $youth1->CivilStatus;
                  $data->Scholarship = $youth1->Scholarship;
                  $data->Occupation = $youth1->Occupation;
                  $data->Sports1 = $youth1->Sports1;
                  $data->Sports2 = $youth1->Sports2;
                  $data->Sports3 = $youth1->Sports3;
                  
                    $data->save();
                }
               return view('tables',['num1'=>$num1,'youth'=>$youth,'educ'=>$educ,'purok'=>$purok,'p1'=>$p1]);
            }
            // 00111
            if($purok == "" && $sex == "" && $education != ""  && $scholar != "" && $age != ""){
                $youth = DB::table('youths')->where('EducStatus', $education)
                ->where('Scholarship', $scholar)
                ->where('Age', $age)
                ->get(); 
                $educ = DB::table('education')->get();
                $purok = DB::table('puroks')->get();
                $p1 = "";

                $num1 = YouthPrint::query()->count(); 
                if($num1!=0){
                  YouthPrint::truncate();  
                }

                foreach($youth as $youth1){
                  $data = new YouthPrint();
                  
                  
                   $data->FullName = $youth1->Lname.", ". $youth1->Fname . " " .substr($youth1->Mname, 0, 1 ).". ".$youth1->EXTname;
                  
                  $data->Bday = $youth1->Bday;
                  $data->Age = $youth1->Age;
                  $data->Sex = $youth1->Sex;
                  $data->parent = $youth1->parent;
                  $data->CPno = $youth1->CPno;
                  $data->EducStatus = $youth1->EducStatus;
                  $data->Purok = $youth1->Purok;
                  $data->PWD = $youth1->PWD;
                  $data->CivilStatus = $youth1->CivilStatus;
                  $data->Scholarship = $youth1->Scholarship;
                  $data->Occupation = $youth1->Occupation;
                  $data->Sports1 = $youth1->Sports1;
                  $data->Sports2 = $youth1->Sports2;
                  $data->Sports3 = $youth1->Sports3;
                  
                    $data->save();
                }
               return view('tables',['num1'=>$num1,'youth'=>$youth,'educ'=>$educ,'purok'=>$purok,'p1'=>$p1]);
            }
            // 00101
            if($purok == "" && $sex == "" && $education != ""  && $scholar == "" && $age != ""){
                $youth = DB::table('youths')->where('EducStatus', $education)
                ->where('Age', $age)
                ->get(); 
                $educ = DB::table('education')->get();
                $purok = DB::table('puroks')->get();
                $p1 = "";

                $num1 = YouthPrint::query()->count(); 
                if($num1!=0){
                  YouthPrint::truncate();  
                }

                foreach($youth as $youth1){
                  $data = new YouthPrint();
                  
                  
                   $data->FullName = $youth1->Lname.", ". $youth1->Fname . " " .substr($youth1->Mname, 0, 1 ).". ".$youth1->EXTname;
                  
                  $data->Bday = $youth1->Bday;
                  $data->Age = $youth1->Age;
                  $data->Sex = $youth1->Sex;
                  $data->parent = $youth1->parent;
                  $data->CPno = $youth1->CPno;
                  $data->EducStatus = $youth1->EducStatus;
                  $data->Purok = $youth1->Purok;
                  $data->PWD = $youth1->PWD;
                  $data->CivilStatus = $youth1->CivilStatus;
                  $data->Scholarship = $youth1->Scholarship;
                  $data->Occupation = $youth1->Occupation;
                  $data->Sports1 = $youth1->Sports1;
                  $data->Sports2 = $youth1->Sports2;
                  $data->Sports3 = $youth1->Sports3;
                  
                    $data->save();
                }
               return view('tables',['num1'=>$num1,'youth'=>$youth,'educ'=>$educ,'purok'=>$purok,'p1'=>$p1]);
            }
            // 00010
            if($purok == "" && $sex == "" && $education == ""  && $scholar != "" && $age == ""){
                $youth = DB::table('youths')->where('Scholarship', $scholar)
                ->get(); 
                $educ = DB::table('education')->get();
                $purok = DB::table('puroks')->get();
                $p1 = "";

                $num1 = YouthPrint::query()->count(); 
                if($num1!=0){
                  YouthPrint::truncate();  
                }

                foreach($youth as $youth1){
                  $data = new YouthPrint();
                  
                  
                   $data->FullName = $youth1->Lname.", ". $youth1->Fname . " " .substr($youth1->Mname, 0, 1 ).". ".$youth1->EXTname;
                  
                  $data->Bday = $youth1->Bday;
                  $data->Age = $youth1->Age;
                  $data->Sex = $youth1->Sex;
                  $data->parent = $youth1->parent;
                  $data->CPno = $youth1->CPno;
                  $data->EducStatus = $youth1->EducStatus;
                  $data->Purok = $youth1->Purok;
                  $data->PWD = $youth1->PWD;
                  $data->CivilStatus = $youth1->CivilStatus;
                  $data->Scholarship = $youth1->Scholarship;
                  $data->Occupation = $youth1->Occupation;
                  $data->Sports1 = $youth1->Sports1;
                  $data->Sports2 = $youth1->Sports2;
                  $data->Sports3 = $youth1->Sports3;
                  
                    $data->save();
                }
               return view('tables',['num1'=>$num1,'youth'=>$youth,'educ'=>$educ,'purok'=>$purok,'p1'=>$p1]);
            }
            // 00011
            if($purok == "" && $sex == "" && $education == ""  && $scholar != "" && $age != ""){
                $youth = DB::table('youths')->where('Scholarship', $scholar)
                ->where('Age', $age)
                ->get(); 
                $educ = DB::table('education')->get();
                $purok = DB::table('puroks')->get();
                $p1 = "";

                $num1 = YouthPrint::query()->count(); 
                if($num1!=0){
                  YouthPrint::truncate();  
                }

                foreach($youth as $youth1){
                  $data = new YouthPrint();
                  
                  
                   $data->FullName = $youth1->Lname.", ". $youth1->Fname . " " .substr($youth1->Mname, 0, 1 ).". ".$youth1->EXTname;
                  
                  $data->Bday = $youth1->Bday;
                  $data->Age = $youth1->Age;
                  $data->Sex = $youth1->Sex;
                  $data->parent = $youth1->parent;
                  $data->CPno = $youth1->CPno;
                  $data->EducStatus = $youth1->EducStatus;
                  $data->Purok = $youth1->Purok;
                  $data->PWD = $youth1->PWD;
                  $data->CivilStatus = $youth1->CivilStatus;
                  $data->Scholarship = $youth1->Scholarship;
                  $data->Occupation = $youth1->Occupation;
                  $data->Sports1 = $youth1->Sports1;
                  $data->Sports2 = $youth1->Sports2;
                  $data->Sports3 = $youth1->Sports3;
                  
                    $data->save();
                }
               return view('tables',['num1'=>$num1,'youth'=>$youth,'educ'=>$educ,'purok'=>$purok,'p1'=>$p1]);
            }
            // 00001
            if($purok == "" && $sex == "" && $education == ""  && $scholar != "" && $age != ""){
                $youth = DB::table('youths')->where('Age', $age)
                ->get(); 
                $educ = DB::table('education')->get();
                $purok = DB::table('puroks')->get();
                $p1 = "";

                $num1 = YouthPrint::query()->count(); 
                if($num1!=0){
                  YouthPrint::truncate();  
                }

                foreach($youth as $youth1){
                  $data = new YouthPrint();
                  
                  
                   $data->FullName = $youth1->Lname.", ". $youth1->Fname . " " .substr($youth1->Mname, 0, 1 ).". ".$youth1->EXTname;
                  
                  $data->Bday = $youth1->Bday;
                  $data->Age = $youth1->Age;
                  $data->Sex = $youth1->Sex;
                  $data->parent = $youth1->parent;
                  $data->CPno = $youth1->CPno;
                  $data->EducStatus = $youth1->EducStatus;
                  $data->Purok = $youth1->Purok;
                  $data->PWD = $youth1->PWD;
                  $data->CivilStatus = $youth1->CivilStatus;
                  $data->Scholarship = $youth1->Scholarship;
                  $data->Occupation = $youth1->Occupation;
                  $data->Sports1 = $youth1->Sports1;
                  $data->Sports2 = $youth1->Sports2;
                  $data->Sports3 = $youth1->Sports3;
                  
                    $data->save();
                }
               return view('tables',['num1'=>$num1,'youth'=>$youth,'educ'=>$educ,'purok'=>$purok,'p1'=>$p1]);
            }
           
        }

    }
    public function searchme(Request $request){
      $search = $request->input('mesearch');

      $youth = DB::table('youths')->Orwhere('Purok', 'LIKE', "%{$search}%")
                ->Orwhere('Sex', 'LIKE', "%{$search}%")
                ->Orwhere('CivilStatus', 'LIKE', "%{$search}%")
                ->Orwhere('EducStatus', 'LIKE', "%{$search}%")
                ->Orwhere('Scholarship', 'LIKE', "%{$search}%")
                ->Orwhere('Sports1', 'LIKE', "%{$search}%")
                ->Orwhere('Sports2', 'LIKE', "%{$search}%")
                ->Orwhere('Sports3', 'LIKE', "%{$search}%")
                ->get(); 

      return view('PrintYouth',['youth'=>$youth]);

    }

   

}
