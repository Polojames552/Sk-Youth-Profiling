<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables</title>


        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    <!-- TO USE AJAX JAVASCRIPT -->
        <script src="path/from/html/page/to/jquery.min.js"></script>
        <script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
   
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            
            <a class="navbar-brand ps-3" href="index.html"></a>
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
                                Charts
                            </a>
                            <a class="nav-link" href="tables">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>

                </nav>
            </div>

            <div id="layoutSidenav_content">
                <main>
    
                                <!-- Input HIDDEN -->
                <!-- <input  type="text" name="sample1" id="sample1"> -->
               

            <!-- <script>
                $(document).ready( function () {
                
                    $("#purok").change(function () {
                        var selectedValue = $(this).val();
                        $('#sample1').val(selectedValue);
                    });
                });

            </script> -->
            <script>
        $(document).ready( function () {
            $("#purok").change(function () {
                    if($("#purok").val()!=""){
                    $("#searchme").attr('disabled',false)
                    }
            });
            $("#sex").change(function () {
                    if($("#sex").val()!=""){
                    $("#searchme").attr('disabled',false)
                    }
            });
            $("#education").change(function () {
                    if($("#education").val()!=""){
                    $("#searchme").attr('disabled',false)
                    }
            });
            $("#scholar").change(function () {
                    if($("#scholar").val()!=""){
                    $("#searchme").attr('disabled',false)
                    }
            });
            $("#education").change(function () {
                    if($("#education").val()!=""){
                    $("#searchme").attr('disabled',false)
                    }
            });
           
        });
            
        
            </script>
                    <div class="container-fluid px-4" >
                        <h1 class="mt-4">Tables</h1>
                        
                  <h5>Filterd by:</h5>
       <form action="{{ route('search') }}" method="GET">
                  <div class="row">
                                  <div class="column01">

                    <div id="filter">
                        <label for="">Purok: 
                            <select class="input--style-5"  id="purok" name="purok">

                                      <option value="" selected="selected"></option>
                                            @foreach ($purok as $purok)
                                                <option  value="{{$purok->purok_name}}">
                                                {{$purok->purok_name}}
                                                </option>
                                            @endforeach
                            </select>
                        </label>
</div>
                                
                                  <div class="column01">
                        <label for="">Gender: 
                            <select class="input--style-5" name="sex" id="sex">
                                <option value="" selected="selected"></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="LGBTQ+">LGBTQ+</option>
                            </select>
                        </label> </div>
 

                        <div class="column01">
                        <label for="">Education: 
                            <select class="input--style-5" name="education" id="education">
                            <option value="" selected="selected"></option>
                                     @foreach ($educ as $educ)
                                          <option value="{{$educ->EducStatus}}">
                                          {{$educ->EducStatus}}
                                          </option>
                                      @endforeach
                            </select>
                        </label></div>

                   
                        <div class="column01">
                        <label for="">Scholars: 
                            <select class="input--style-5" name="scholars" id="scholar">
                            <option value="" selected="selected"></option>
                            <option value="Scholar">Scholar</option>
                            <option value="None">None</option>
                            </select>
                        </label></div>

                        <div class="column01">
                        <label for="">Age: 
                            <select class="input--style-5" name="age" id="age">
                            <option value="" selected="selected"></option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            </select>
                        </label></div>

                        </div>  
                        </div>
                        <br><br>

               
                   <div class="column01">
                        <button class="button-24" id="searchme" role="button" disabled>Search</button>
                    </form>     
                       
                        <form action="tables" method="GET">
                            <button class="button-25" id="refreshme" role="button">Refresh</button>
                        </form>        
                     
                        <form action="export" method="GET">
                            <button class="button-25" id="exportme" role="button">Export File</button>
                         
                        </form> 
                        <!-- <a href="/export" class="btn btn-primary">Export File</a> -->
                    </div>   


                    <script>

        function printDiv() {
            var divContents = document.getElementById("bodycard").innerHTML;
            var a = window.open('', '', 'height=1500, width=1500');
            a.document.write('<html>');
            a.document.write('<body > <h1>San Youths<br>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }

    </script>
            <form action="{{ route('prnpriview') }}" method="GET">
                <button class="btnprn btn btn-primary">Print Preview</button>
            </form>
                 <!-- <center><a href="{{ url('/prnpriview') }}" class="btnprn btn btn-primary">Print Preview</a> </center>      -->
                 
                 <script type="text/javascript">
                    $(document).ready(function(){
                    $('.btnprn').printPage();
                    });
                    $('.print-window').click(function() {
                        window.print();
                    });
                    </script>  

                      <br><br>

                        <div class="card mb-4" id="boxx">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                             <!-- <a href="#" type="button"  class="btn btn-info btn-lg" id="print" onclick="printDiv()">
                              <span class="fa fa-print"></span> Print
                            </a>  -->
                            
                            <div class="card-body" id="bodycard">
                                <table id="datatablesSimple" border="1px">
                                    <thead>
                                        <tr>
                                        <th>id</th>
                                        <th>Full Name</th>
                                            <!-- <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Name Extension</th>  -->
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
                                            <!-- <td>{{$youth->Fname}}</td>
                                            <td>{{$youth->Mname}}</td>
                                            <td>{{$youth->Lname}}</td> 
                                            <td>{{$youth->EXTname}}</td>  -->
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
                    </div>
                </main>

            </div>
        </div>

<style>
.botss1{
    display: inline-block;
}
.column01 {
  float: center;
  width: 100%;
  padding: 0 8px;
  display: flex;
  
}

@media screen and (max-width: 650px) {
  .column01 {
    width: 150%;
    /* display: block; */
  }
#boxx{
    width: 100%;
}

}

#filter{
    width:  100%;
    justify-content: space-between;
} 

@media (max-width: 800px) {
    #print{
        width: 100%;
    }
#bodycard{
    width: 100%;
}

/* #filter{
    width:  100%;
    justify-content: space-between;
} */

    }

.input--style-5 {
  border: none;
  line-height: 50px;
  background:#f2f2f2;
  height: 40px;
  width: 100%;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
  padding: 0 20px;
  font-size: 16px;
  color: #666;
  -webkit-box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
  -moz-box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
  box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
  -webkit-transition: all 0.4s ease;
  -o-transition: all 0.4s ease;
  -moz-transition: all 0.4s ease;
  transition: all 0.4s ease;
}

    #print{
        background: #1380d4;
    }
    #print:hover {
  background-color: #51a9ed; 
  /* background-position: 0 0;
  color: #2487d4; */
}
.button-24 {
  /* background: rgba(33, 208, 71, 0.8); */
  background:  #1380d4;
  border: 1px solid rgba(33, 208, 71, 0.8);
  border-radius: 6px;
  box-shadow: rgba(0, 0, 0, 0.1) 1px 2px 4px;
  box-sizing: border-box;
  padding-left: 20px;
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
  color:  #1380d4;
}

.button-24:active {
  opacity: .5;
}

.button-25 {
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

.button-25:hover,
.button-25active {
  background-color: initial;
  background-position: 0 0;
  color: rgba(33, 208, 71, 0.8);
}

.button-25:active {
  opacity: .5;
}

</style>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
