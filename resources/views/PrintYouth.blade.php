@extends('my')
@section('content')
<!-- <center><br><br><a href="{{ url('/prnpriview') }}" class="btnprn btn">Print Preview</a></center> -->
   
       

   <script type="text/javascript">
        // $(document).ready(function(){
        //     $('.btnprn').click(function() {
        //                 window.print();
        //     });
        // });

        function printDiv() {
            var divContents = document.getElementById("bodycard").innerHTML;
            var a = window.open('', '', 'height=1500, width=1500');
            a.document.write('<html>');
            a.document.write('<body><center><b>San Julian, Irosin, Sorsogon</b></center><br>');
            a.document.write('<center>Sangguniang Kabataan</center><br>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>
    <br><br>
   
    <form action="{{ route('searchme') }}" method="GET">
        <label for="">
            Filter Data:
        </label>
        <input type="text" name="mesearch" autocomplete="off">
        <button class= "btn btn-info">Search</button>
        <p>Can filter: <i>(Purok, CivilStatus, Education Status, Scholars, and Sports)</p></i>
    </form>

    <center><a href="#" type="button"  class="btn btn-info btn-lg" id="print" onclick="printDiv()">
                              <span class="fa fa-print"></span> Print Data
                            </a> 
    </center> 
<div id="bodycard">
<center><h3>Youth Data</h3></center>
                <table class="table" border="1px">
                            <thead class="thead-dark">
                                <tr>
                                            <th>Full Name</th>
                                            <th>Birthday</th>
                                            <th>Age</th>
                                            <th>Sex</th>
                                            <th>Parent</th>
                                            <th>Cellphone Number</th>
                                            <th>Education Status</th>
                                            <th>Purok</th>
                                            <th>PWD</th>
                                            <th>Civil Status</th>
                                            <th>Scholarship</th>
                                            <th>Occupation</th>
                                            <th>Sport1</th>
                                            <th>Sport2</th>
                                            <th>Sport3</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($youth as $youth) 
                            <tr>
                                <td>{{$youth->Fname}} {{$youth->Mname}}<b>.</b> {{$youth->Lname}} {{$youth->EXTname}}</td>
                                <td>{{$youth->Bday}}</td>
                                <td>{{$youth->Age}}</td>
                                <td>{{$youth->Sex}}</td>
                                <td>{{$youth->parent}}</td>
                                <td>{{$youth->CPno}}</td>
                                <td>{{$youth->EducStatus}}</td>
                                <td>{{$youth->Purok}}</td>
                                <td>{{$youth->PWD}}</td>
                                <td>{{$youth->CivilStatus}}</td>
                                <td>{{$youth->Scholarship}}</td>
                                <td>{{$youth->Occupation}}</td>
                                <td>{{$youth->Sports1}}</td>
                                <td>{{$youth->Sports2}}</td>
                                <td>{{$youth->Sports3}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                    </div> 
                    </div>


@endsection