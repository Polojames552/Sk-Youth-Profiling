<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>SK Form</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/SKform.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                  
                   <center><img src="image/SKcover.png" width="75%" height="70%" alt=""></center>

                   <center>  <h2 class="title">Registration Form</h2></center>
                  
                   <!-- <div class="error"> -->
                       <!-- Validation Errors -->
         <x-guest-layout>
            <x-slot name="logo">
           </x-slot>

                <x-auth-validation-errors class="mb-4" :errors="$errors" />
          
         </x-guest-layout>
         <style>
             #req{
                 color:red;
             }
         </style>
                   <!-- </div> -->
                   
                  <b><b id="req">*</b><i>Required</i></b>
                   <br><br>
                   <form action="youth" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label"><b id="req">*</b>First Name</label>
                                    <input class="input--style-4" type="text" name="FirstName" autocomplete="off" required >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Middle Name</label>
                                    <input class="input--style-4" type="text" name="MiddleName" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label"><b id="req">*</b>Last Name</label>
                                    <input class="input--style-4" type="text" name="LastName" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Name Extension</label>
                                    <input class="input--style-4" type="text" name="Extension" autocomplete="off" placeholder="(Ex. Jr.)">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label"><b id="req">*</b>Birthday</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-5 js-datepicker" type="date" min="1980-01-01" max="2999-12-31" name="Birthday" required>
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                              <div class="input-group">
                                <label class="label"><b id="req">*</b>Gender</label>
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select class="input--style-5" type="text" name="Sex" required>
                                        <option disabled="disabled" selected="selected"></option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>LGBTQ+</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label"><b id="req">*</b>Parent Name</label>
                                    <input class="input--style-4" type="text" name="ParentName" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label"><b id="req">*</b>Phone Number</label>
                                    <input class="input--style-4" type="phone" name="CPno" maxlength="11" autocomplete="off" required>
                                </div>
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                  <label class="label"><b id="req">*</b>Educational Status</label>
                                  <div class="rs-select2 js-select-simple select--no-search">
                                      <select class="input--style-5" type="text" name="EducStatus" required>
                                      <option disabled="disabled" selected="selected"></option>
                                     @foreach ($educ as $educ)
                                          <option value="{{$educ->EducStatus}}">
                                          {{$educ->EducStatus}}
                                          </option>
                                      @endforeach
                                      </select>
                                      <div class="select-dropdown"></div>
                                  </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label"><b id="req">*</b>Purok</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select class="input--style-5" type="text" name="Purok" required>
                                            <option disabled="disabled" selected="selected"></option>
                                            @foreach ($purok as $purok)
                                                <option value="{{$purok->purok_name}}">
                                                {{$purok->purok_name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                  <label class="label"><b id="req">*</b>Person With Disability (PWD)</label>
                                  <div class="rs-select2 js-select-simple select--no-search">
                                      <select class="input--style-5" type="text" name="PWD" required>
                                          <option disabled="disabled" selected="selected"></option>
                                          <option>Yes</option>
                                          <option>No</option>
                                      </select>
                                      <div class="select-dropdown"></div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label"><b id="req">*</b>Civil Status</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select class="input--style-5" type="text" name="CivilStatus" required>
                                            <option disabled="disabled" selected="selected"></option>
                                            <option>Single</option>
                                            <option>Married</option>
                                            <option>Widowed</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                              <div class="input-group">
                                  <label class="label"><b id="req">*</b>Scholarship</label>
                                  <div class="rs-select2 js-select-simple select--no-search">
                                      <select class="input--style-5" type="text" name="Scholarship" required>
                                          <option disabled="disabled" selected="selected"></option>
                                          <option>None</option>
                                          <option>Scholar</option>
                                      </select>
                                      <div class="select-dropdown"></div>
                                  </div>
                              </div>
                            </div>

                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Occupation</label>
                                    <input class="input--style-4" type="text" name="Occupation" >
                                </div>
                            </div>
                            
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Sports(1)</label>
                                    <input class="input--style-4" type="text" name="Sports1" >
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">(2)</label>
                                    <input class="input--style-4" type="text" name="Sports2" >
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">(3)</label>
                                    <input class="input--style-4" type="text" name="Sports3" >
                                </div>
                            </div>
                            </div>
                            </div>
                            
                            
                            <div class="row row-space">
                            <!-- <div class="bttn"> -->
                            <div class="flex-parent jc-center">
                                        <!-- <div class="col-2"  id="sub"> -->
                                        <div class="col-2">
                                         <button class="button-5" role="button">Submit</button>
                                        </div>
                        </form> 
                                        <!-- <div class="col-2" id="cancel"> -->
                                        <div class="col-2">
                                            <form action="{{route('welcome')}}" method="get">
                                                        <button class="button-6"  role="button">Cancel</button>
                                            </form>
                                        </div>
                                </div>
                                </div>
                        </div>
                        


                        <!-- HTML !-->
                    

<style>
   
/* .error{
    background-color:#f23339;
} */

.flex-parent {
  display: flex;
  padding-bottom: 50px;
}

.jc-center {
  justify-content: center;
}

button.margin-right {
  margin-right: 20px;
}

.bttn{
    padding-bottom: 50px;
    justify-content: center;
  
  
   
}

@media (max-width:800px){
   
    .bttn{
    padding-bottom: 50px;
    justify-content: center;
    /* margin-right: 100px;
    margin-left: 150px; */
   
}

.flex-parent {
 
  display: block;
    width: 250px;  
}

.jc-center {
  justify-content: center;
}

  
}

    
    /* #cancel{
    margin-top: -50px;
    margin-left: 100px;
    padding-left: 100px;
}
    padding-right: 10px;

#sub{
    padding-right: 100px;
    margin-right: 100px;
   
} */
}

/* #sub{
    padding-right: 10px;
   
} */
              
/* #cancel{
    padding-bottom: 50px;
  

} */

.input--style-5 {
    border: none;
  line-height: 50px;
  background:#f2f2f2;
  height: 50px;
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



.input--style-4 {
  line-height: 50px;
  background:#f2f2f2;
  -webkit-box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
  -moz-box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
  box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
  padding: 0 20px;
  font-size: 16px;
  color: #666;
  -webkit-transition: all 0.4s ease;
  -o-transition: all 0.4s ease;
  -moz-transition: all 0.4s ease;
  transition: all 0.4s ease;
}


.button-5 {
  align-items: center;
  background-clip: padding-box;
  background-color: #0571ff;
  border: 1px solid transparent;
  border-radius: .25rem;
  box-shadow: rgba(0, 0, 0, 0.02) 0 1px 3px 0;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-flex;
  font-family: system-ui,-apple-system,system-ui,"Helvetica Neue",Helvetica,Arial,sans-serif;
  font-size: 16px;
  font-weight: 600;
  justify-content: space-between;
  line-height: 1.25;
  margin: 0;
  min-height: 3rem;
  padding: 10px 79px;
  margin-left: 80px;
  position: relative;
  text-decoration: none;
  transition: all 250ms;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: baseline;
  
  
}

.button-5:hover,
.button-5:focus {
  background-color: #2e89ff;
  box-shadow: rgba(55, 146, 250, 0.8) 0 4px 12px;
}

.button-5:hover {
  transform: translateY(-1px);
}

.button-5:active {
  background-color: #c85000;
  box-shadow: rgba(55, 146, 250, 0.8) 0 2px 4px;
  transform: translateY(0);
  
}

/* asds */
.button-6 {
  align-items: center;
  background-clip: padding-box;
  background-color: #f02b38;
  border: 1px solid transparent;
  border-radius: .25rem;
  box-shadow: rgba(246, 32, 32, 0.8) 0 1px 3px 0;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-flex;
  font-family: system-ui,-apple-system,system-ui,"Helvetica Neue",Helvetica,Arial,sans-serif;
  font-size: 16px;
  font-weight: 600;
   justify-content: space-between;
  line-height: 1.25;
  margin: 0;
  min-height: 3rem;
  padding: 1px 80px;
  position: relative;
  text-decoration: none;
  transition: all 250ms;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: baseline;
  margin-left: 80px;
  
}

.button-6:hover,
.button-6:focus {
  background-color: #f02b38;
  box-shadow: rgba(246, 32, 32, 0.8) 0 4px 12px;
}

.button-6:hover {
  transform: translateY(-1px);
}

.button-6:active {
  background-color: #f02b38;
  box-shadow: rgba(246, 32, 32, 0.8) 0 2px 4px;
  transform: translateY(0);
  
}

</style>
                    
                </div>
            </div>
        </div>
    </div>



    
    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
