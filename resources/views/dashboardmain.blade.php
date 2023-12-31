<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard-Sk Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>   <!-- humburgerv link-->
<!-- balagbag  -->
        <!-- jquery document ready -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


        <!-- Modal popup bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->

            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <img src="image/sklogo.png" width="120%" height="150px" class="center">

                            <h3 class="center">Sangguniang Kabataan</h3>
                            <div class="sb-sidenav-menu-heading">Baranggay San Julian</div>

                            <a class="nav-link" href="dashboardmain">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>



                             <a class="nav-link" href="charts">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts & Announcement
                            </a>
                            <a class="nav-link" href="tables">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables & Export Data
                            </a>



                            <form method="POST" action="{{ route('logout') }}">
                                       @csrf
                                                <x-dropdown-link class="nav-link" :href="route('logout')"
                                                        onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                                <div class="sb-nav-link-icon"><i class="fa fa-user bar"></i></div> {{ __('Log Out') }}
                                                </x-dropdown-link>
                            </form>

                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>

                        <center><i><h3 class="mt-4">Total Youth Registered Population: <b id="num">{{$count}}</b></h3></i></center>
                      <style>
                          #num{
                            color:red;
                          }
                    </style>

                    <br><br>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-4" id="purok">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Youth Population per PUROK
                                    </div>
                                  <div  id="columnchart_values" style="width: 100%; height: 400px;"></div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card mb-4"  id="purok">
                                    <div class="card-header">
                                        <i class="fas fa-chart-pie me-1"></i>
                                        Youth Population by GENDER
                                    </div>
                                    <div id="piechart" style="width: 400px; height: 300px;"></div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4"  id="purok">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body"id="bodycard">
                                <table id="datatablesSimple" class="TableData">
                                    <thead>
                                        <tr>
                                             <th>ID</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Name Extension</th>
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
                                             <input type="hidden" id="youth_id" value="{{$youth->id}}">
                                            <td>{{$youth->id}}</td>
                                            <td>{{$youth->Fname}}</td>
                                            <td>{{$youth->Mname}}</td>
                                            <td>{{$youth->Lname}}</td>
                                            <td>{{$youth->EXTname}}</td>
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
                                            <td><a class="button-24"  href="click_edit/{{$youth->id}}">Edit</a></td>
                                            <td>
                                                <!-- <button type="button" class="button-25" id="btndelete">Delete</button> -->
                                                 <a href="javascript:void(0)" class="button-25" id="deletebtn">Delete</a>
                                                <!-- <button type="button" class="btn btn-danger deletebtn">Delete</button> -->
                                                <!-- <button type="button" class="btn btn-danger servideletevebtn">Delete</button> -->
                                            </td>
                                                <!-- </form>  -->
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
            </div>

<!-- Modal delete -->
<div class="modal fade" id="deletemodalpop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Youth Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form id="delete_modal_Form" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <div class="modal-body">
<h4></h4>
            <p>Are you sure you want to <b id="deletem">DELETE</b> this data?</p>
                <input type="hidden" id="delete_youth_id">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Delete</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
        </form>
            </div>
    </div>
  </div>
</div>
<!-- Modal delete -->

        </div>


        <script>
              $(document).ready(function(){

                  $('.TableData').on('click', '#deletebtn', function(){

                    $tr = $(this).closest('tr');

                      var data = $tr.children("td").map(function(){
                          return $(this).text();
                      }).get();

                      $('#delete_youth_id').val(data[0]);
                    //   $('#youth_name').val(data[1]);
                      $('#delete_modal_Form').attr('action', 'youth-delete/'+data[0]);

                      $('#deletemodalpop').modal('show');
                  });

                //  $('.deletebtn').click(function (e){
                //      e.preventDefault();

                //      var delete_id = $('#youth_id').val();
                //      $('#delete_youth_id').val(delete_id);
                //  });

                // $('.servideletevebtn').click(function (e){
                //     e.preventDefault();
                //     alert('hello');
                // });
              });
        </script>



 <!-- BAR GRAPH Purok Population -->
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["Purok 1", {{$purok1}}, "#b32e82"],
        ["Purok 2", {{$purok2}}, "#bfb4bb"],
        ["Purok 3", {{$purok3}}, "#c1ced6"],
        ["Purok 4-A", {{$purok4A}}, "#4de8b2"],
        ["Purok 4-B", {{$purok4B}}, "#3bccd1"],
        ["Purok 5", {{$purok5}}, "#3db0ba"],
        ["Purok 6", {{$purok6}}, "#3d8aba"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Population",
        width: 500,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>

     <!-- PIE GRAPH (Boys & Girls Population) -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Gender', 'Youth Genders'],
          ['Male',     {{$FMale}}],
          ['Female',    {{$FFemale}}],
          ['LGBT',    {{$FLGBTQ}}]
        ]);
        var options = {
          title: 'Gender Statistics'
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }

    </script>



<style>
#deletem{
    color:red;
}


@media (max-width: 800px) {
    .card{
        width: 520px;
    }

    #purok {
        height: 400px;
         width: 330px;
    }

         #pie {
        height: 300px;
        width: 330px;
         }


   #piechart{
       height: 50px;
       width: 50px;
   }

            #bodycard{
            width: 100%;
        }

    }

.button-24 {
  background: rgba(33, 208, 71, 0.8);
  border: 1px solid rgba(33, 208, 71, 0.8);
  border-radius: 6px;
  box-shadow: rgba(0, 0, 0, 0.1) 1px 2px 4px;
  box-sizing: border-box;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: nunito,roboto,proxima-nova,"proxima nova",sans-serif;
  font-size: 16px;
  font-weight: 800;
  line-height: 16px;
  min-height: 40px;
  outline: 0;
  padding: 12px 14px;
  text-align: center;
  text-rendering: geometricprecision;
  text-transform: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: middle;
}

.button-24:hover,
.button-24:active {
  background-color: initial;
  background-position: 0 0;
  color: rgba(33, 208, 71, 0.8);
}

.button-24:active,
.button-25:active {
  opacity: .5;
}


.button-25 {
  background: rgba(243, 46, 53, 0.8);
  border: 1px solid rgba(243, 46, 53, 0.8);
  border-radius: 6px;
  box-shadow: rgba(243, 46, 53, 0.8) 1px 2px 4px;
  box-sizing: border-box;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: nunito,roboto,proxima-nova,"proxima nova",sans-serif;
  font-size: 16px;
  font-weight: 800;
  line-height: 16px;
  min-height: 40px;
  outline: 0;
  padding: 12px 14px;
  text-align: center;
  text-rendering: geometricprecision;
  text-transform: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: middle;
}
.button-25:hover,
.button-25:active {
  background-color: initial;
  background-position: 0 0;
  color: rgba(243, 46, 53, 0.8);
}
</style>


        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>   <!-- grap link-->
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>  <!-- gride line table-->
        <script src="js/datatables-simple-demo.js"></script>
        <script src="assets/demo/chart-pie-demo.js"></script>
    </body>
</html>
