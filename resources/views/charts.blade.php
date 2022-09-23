<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Charts</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <!-- <a class="navbar-brand ps-3" href="index.html"></a> -->
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
                      <h1 class="mt-4">Charts</h1>
                      <center><i><h3 class="mt-4">Total Youth Registered Population: <b id="num">{{$count}}</b></h3></i></center>  
                      <style>
                          #num{
                            color:red;
                          }
                      </style>
                        <ol class="breadcrumb mb-4">
                            <!-- <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li> -->
                            <li class="breadcrumb-item active">Charts</li>
                        </ol>
                
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-4"id="purok">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Youth Population per PUROK
                                    </div>
                                  <div id="columnchart_values" style="width: 600px; height: 400px;"></div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card mb-4" id="pie">
                                    <div class="card-header">
                                        <i class="fas fa-chart-pie me-1"></i>
                                        Youth Population by GENDER
                                    </div>
                                    <div id="piechart" style="width: 400px; height: 300px;"></div>
                                </div>
                            </div>
                        </div>
<br><br><br><br><br><br>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-4" id="purok">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Youth Population by EDUCATIONAL  LEVELS
                                    </div>
                                    <div id="Bar_Education" style="width: 600px; height: 400px;"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-4" id="pie">
                                    <div class="card-header">
                                        <i class="fas fa-chart-pie me-1"></i>
                                        Youth Population per AGE RATIO
                                    </div>
                                    <div id="Age" style="width: 400px; height: 300px;"></div>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <label for=""><h4>Announcement:</h4></label>
                  
                        <form action="announceEDIT" method="post" enctype="multipart/form-data">
                         {{ csrf_field() }}
                            <textarea  class="col-lg-12" id="announcement" rows="6" name="announcement">
                            {{$announcement[0]->announcement}}
                            </textarea>
                            <p align="right">
                              <button class="btnprn btn btn-primary">Update</button>
                            </p>
                          </form>
                     

                        <br><br>
                    </div>
                </main>

            </div>
        </div>

        <style>
          @media (max-width: 800px) {
    .card{
        width: 520px;
    }

    #purok{
        height: 400px;
        width: 330px;
    }

    #pie {
        height: 300px;
        width: 330px;
    }
    
    #announcement{
      height: 250px;
        width: 330px;
    }

    }
        </style>


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

      <!-- BAR GRAPH (Boys & Girls Population) -->
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["Master's Degree", {{$master}}, "#b32e82"],
        ["College Graduate", {{$cg}}, "#b83fd4"],
        ["College Level", {{$cl}}, "#bfb4bb"],
        ["College Undergraduate", {{$cu}}, "#c1ced6"],
        ["Senior High School", {{$shs}}, "#4de8b2"],
        ["Junior High School", {{$jhs}}, "#3bccd1"],
        ["High School Undergraduate", {{$hsu}}, "#3db0ba"],
        ["Elementary Level", {{$el}}, "#3d8aba"],
        ["Elementary Undergraduate", {{$eu}}, "#1448c9"]
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
        height: 300,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("Bar_Education"));
      chart.draw(view, options);
  }
  </script>

    <!-- PIE GRAPH (PWD) -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
          
        var data = google.visualization.arrayToDataTable([
          ['Sex', 'Boy to Girls ratio'],
          ['15-18 years old',     {{$F15to18}}],
          ['19 years old & Above',     {{$F19Above}}]
        ]);
        var options = {
          title: 'Gender Statistics'
        };
        var chart = new google.visualization.PieChart(document.getElementById('Age'));

        chart.draw(data, options);
      }
    </script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/demo/chart-pie-demo.js"></script>  -->
    </body>
</html>
