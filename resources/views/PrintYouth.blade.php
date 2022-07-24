@extends('my')
@section('content')
<!-- <center><br><br><a href="{{ url('/prnpriview') }}" class="btnprn btn">Print Preview</a></center> -->

          <!-- Modal popup bootstrap -->
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


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
                <table class="table" border="1px" id="datatable1">
                            <thead class="thead-dark">
                                <tr>
                                            <th>ID</th>
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
                                <td>{{$youth->id}}</td>
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
                               <td><a href="javascript:void(0)" class="btn btn-danger deletebtn" data-bs-toggle="modal" data-bs-target="#deletemodalpop">Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                    </div>
                    </div>

                    <!-- Modal delete -->
<div class="modal fade" id="deletemodalpop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form id="delete_modal_Form" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <div class="modal-body">
            <!-- <button type="button" class="button-25" id="btndelete">Delete</button> -->
                <input type="text" id="delete_youth_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete Data</button>
        </form>
            </div>
    </div>
  </div>
</div>
<!-- Modal delete -->

<script type="text/javascript">

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

$(document).ready(function(){
            $('#datatable1').DataTable();

            $('#datatable1').on('click', '.deletebtn', function(){
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                //console.log(data);

                $('#delete_youth_id').val(data[0]);

                $('#delete_modal_Form').attr('action', '/youth-delete/'+data[0]);

                $('#deletemodalpop').modal('show');
            });
      });
</script>


@endsection
