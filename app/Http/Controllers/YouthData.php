<?php

namespace App\Http\Controllers;
use App\Models\youth;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\ValidationException;
use DB;
use Carbon\Carbon;

class YouthData extends Controller
{
    public function create(){
        return view('welcome');
    }

    public function store(Request $request)
    {
        
    $count = DB::table('youths')->where('Fname', $request->input('FirstName'))->where('parent', $request->input('ParentName'))->where('Lname', $request->input('LastName'))->count();
    if($count==0){
        $data = new youth();
        $data->Fname = $request->input('FirstName');
        // $data->Mname = $request->input('MiddleName');
        if($request->input('MiddleName')==""){
            $data->Mname = " ";
        }else{
            $data->Mname = $request->input('MiddleName');
        }
        
        $data->Lname = $request->input('LastName');

        if($request->input('Extension')==""){
            $data->EXTname = " ";
        }else{
            $data->EXTname = $request->input('Extension');
        }
        $data->Bday = $request->input('Birthday');
        $data->Age = Carbon::parse($request->input('Birthday'))->diff(Carbon::now())->y;
        $data->Sex = $request->input('Sex');
        $data->parent = $request->input('ParentName');
        $data->CPno = $request->input('CPno');
        $data->EducStatus = $request->input('EducStatus');
        $data->Purok = $request->input('Purok');
        $data->PWD = $request->input('PWD');
        $data->CivilStatus = $request->input('CivilStatus');
        $data->Scholarship = $request->input('Scholarship');
        if($request->input('Occupation')==""){
                $data->Occupation = " ";
            }else{
                $data->Occupation = $request->input('Occupation');
            }
        if($request->input('Sports1')==""){
                $data->Sports1 = " ";
            }else{
                $data->Sports1 = $request->input('Sports1');
            }
        if($request->input('Sports2')==""){
                $data->Sports2 = " ";
            }else{
                $data->Sports2 = $request->input('Sports2');
            }
        if($request->input('Sports3')==""){
                $data->Sports3 = " ";
            }else{
                $data->Sports3 = $request->input('Sports3');
            }
        $data->save();

            //   DB::insert('insert into items Fname =?, Mname =?, Lname =?, EXTname =?, Bday =?, Age =?,
            //    Sex =?, parent =?, CPno =?, EducStatus =?, Purok =?,
            //    PWD =?, CivilStatus =?, Scholarship =?',
            //   [$FirstName, $MiddleName, $LastName, $Extension,
            //   $Birthday, 22, $Sex, $ParentName, $CPno,
            //   $EducStatus, $Purok, $PWD, $CivilStatus, $Scholarship, $id]);
        return redirect(RouteServiceProvider::HOME1);
        }
        else{
            throw ValidationException::withMessages([
                'email' => __('auth.norepeat'),
            ]);
        }
    }

    public function edit_function($id)
    {
      $educ = DB::table('education')->get();
      $purok = DB::table('puroks')->get();

      $youth = DB::select('select * from youths where id = ?', [$id]);
      
      return view ('Edit',['youth'=>$youth,'educ'=>$educ,'purok'=>$purok]);
    }

    public function update_function(Request $request, $id)
    {
     
        $Fname = $request->input('FirstName');
        // $Mname = $request->input('MiddleName');
        if($request->input('MiddleName')==""){
            $Mname = " ";
        }else{
            $Mname = $request->input('MiddleName');
        }
        $Lname = $request->input('LastName');
       
        if($request->input('Extension')==""){
            $EXTname = " ";
        }else{
            $EXTname = $request->input('Extension');
        }

        $Bday = $request->input('Birthday');
        $Age = Carbon::parse($request->input('Birthday'))->diff(Carbon::now())->y;
        $Sex = $request->input('Sex');
        $parent = $request->input('ParentName');
        $CPno = $request->input('CPno');
        $EducStatus = $request->input('EducStatus');
        $Purok = $request->input('Purok');
        $PWD = $request->input('PWD');
        $CivilStatus = $request->input('CivilStatus');
        $Scholarship = $request->input('Scholarship');
        if($request->input('Occupation')==""){
            $Occupation = " ";
            }else{
                $Occupation = $request->input('Occupation');
        }
        if($request->input('Sports1')==""){
                $Sports1 = " ";
            }else{
                $Sports1 = $request->input('Sports1');
            }
        if($request->input('Sports2')==""){
                $Sports2 = " ";
            }else{
                $Sports2 = $request->input('Sports2');
            }
        if($request->input('Sports3')==""){
            $Sports3 = " ";
            }else{
                $Sports3 = $request->input('Sports3');
        }
        // DB::update('update users set User_Status =? where id=?',
        // [$user_Status, $id]);

        DB::table('youths')
        ->where('id', $id)
        ->update(array(
        'Fname' => $Fname,
        'Mname' => $Mname,
        'Lname' => $Lname,
        'EXTname' => $EXTname,
        'Bday' => $Bday,
        'Age' => $Age,
        'Sex' => $Sex,
        'parent' => $parent,
        'CPno' => $CPno,
        'EducStatus' => $EducStatus,
        'Purok' => $Purok,
        'PWD' => $PWD,
        'CivilStatus' => $CivilStatus,
        'Scholarship' => $Scholarship,
        'Occupation' => $Occupation,
        'Sports1' => $Sports1,
        'Sports2' => $Sports2,
        'Sports3' => $Sports3)); 

        return redirect('dashboardmain')->with('message', 'Data has been Updated');
    }
    public function update_function1(Request $request){

        $announce = $request->input('announcement');
        DB::table('users')->update(array('announcement' => $announce));

        return redirect('charts')->with('message', 'Announcement has been Updated');
    }

    public function destroy($id)
    {
    $youth = Youth::findOrFail($id);

    $youth->delete();
   
    return redirect('dashboardmain')->with('message', 'The data is successfully deleted!');
    }
}
