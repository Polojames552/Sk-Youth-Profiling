<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Youth;
use DB;
use App\Exports\YouthExport;
use Maatwebsite\Excel\Facades\Excel;


class PrintController extends Controller
{
     public function index()
    {
          $print = Youth::all();
          return view('printstudent',['print'=>$print,'youth'=>$youth,'educ'=>$educ,'purok'=>$purok,'p1'=>$p1])->with('print', $print);;
    }
    public function prnpriview()
    {
            $educ = DB::table('education')->get();
            $purok = DB::table('puroks')->get();
            $p1 = "";

          $youth = Youth::all();
          $print = Youth::all();
          return view('PrintYouth',['print'=>$print,'youth'=>$youth,'educ'=>$educ,'purok'=>$purok,'p1'=>$p1])->with('print', $print);;
    }

    public function export()
    {
      return Excel::download(new YouthExport, 'SK_San Julian.xlsx');
    }
  
}
