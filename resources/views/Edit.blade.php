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

                   <center>  <h2 class="title">Edit Youth Data</h2></center>

                   <!-- <div class="error"> -->
                       <!-- Validation Errors -->
         <x-guest-layout>
            <x-slot name="logo">
           </x-slot>

                <!-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> -->

         </x-guest-layout>
         <style>
             #req{
                 color:red;
             }
         </style>
                   <!-- </div> -->

                  <b><b id="req">*</b><i>Required</i></b>
                   <br><br>
                   <form action="{{ route ('update-user' , $youth[0]->id) }} " method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                <label class="label">First Name</label>
                                    <input class="input--style-4" type="text" name="FirstName" value="{{$youth[0]->Fname}}" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                <label class="label">Middle Name</label>
                                    <input class="input--style-4" type="text" name="MiddleName" value="{{$youth[0]->Mname}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                <label class="label">Last Name</label>
                                    <input class="input--style-4" type="text" name="LastName" value="{{$youth[0]->Lname}}" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                <label class="label">Suffix</label>
                                    <input class="input--style-4" type="text" name="Extension" value="{{$youth[0]->EXTname}}"placeholder="(Ex. Jr.)">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group" >
                                    <label class="label"><b id="req">*</b>Birthday</label>
                                    <div class="input-group-icon" >
                                    <input class="input--style-5 js-datepicker" type="date" name="Birthday" value="{{$youth[0]->Bday}}" required>
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                              <div class="input-group">
                                <label class="label"><b id="req">*</b>Gender</label>
                                <div class="rs-select2 js-select-simple select--no-search">
                                @if($youth[0]->Sex == 'Male')
                                    <select class="input--style-5" type="text" name="Sex" required>
                                        <option selected>{{$youth[0]->Sex}}</option>
                                        <option>Female</option>
                                        <option>LGBT</option>
                                    </select>
                                @elseif($youth[0]->Sex == 'Female')
                                    <select class="input--style-5" type="text" name="Sex" required>
                                        <option selected>{{$youth[0]->Sex}}</option>
                                        <option>Male</option>
                                        <option>LGBT</option>
                                    </select>
                                @elseif($youth[0]->Sex == 'LGBT')
                                <select class="input--style-5" type="text" name="Sex" required>
                                    <option selected>{{$youth[0]->Sex}}</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                                @endif
                                    <div class="select-dropdown"></div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                <label class="label">Parent Name</label>
                                    <input class="input--style-4" type="text" name="ParentName" value="{{$youth[0]->parent}}" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                <label class="label">Phone Number</label>
                                    <input class="input--style-4" type="phone" name="CPno" value="{{$youth[0]->CPno}}" maxlength="11" required>
                                </div>
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                  <label class="label"><b id="req">*</b>Educational Status</label>
                                  <div class="rs-select2 js-select-simple select--no-search">
                                  <select class="input--style-5" type="text" name="EducStatus" required>
                                        <option value="{{$youth[0]->EducStatus}}" selected>{{$youth[0]->EducStatus}}</option>
                                        @foreach ($educ as $educ)
                                            @if($youth[0]->EducStatus <> $educ->EducStatus)
                                                    <option value="{{$educ->EducStatus}}">
                                                        {{$educ->EducStatus}}</option>
                                            @else
                                            @endif
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
                                        <option value="{{$youth[0]->Purok}}" selected>{{$youth[0]->Purok}}</option>
                                            @foreach ($purok as $purok)
                                                @if($youth[0]->Purok <> $purok->purok_name)
                                                        <option value="{{$purok->purok_name}}">
                                                            {{$purok->purok_name}}</option>
                                                @else
                                                @endif
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
                                  @if($youth[0]->PWD == 'Yes')
                                    <select class="input--style-5" type="text" name="PWD" required>
                                          <option selected>Yes</option>
                                          <option>No</option>
                                    </select>
                                  @elseif($youth[0]->PWD == 'No')
                                          <select class="input--style-5" type="text" name="PWD" required>
                                                <option>Yes</option>
                                                <option selected>No</option>
                                          </select>
                                  @endif
                                      <div class="select-dropdown"></div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label"><b id="req">*</b>Civil Status</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                    @if($youth[0]->CivilStatus == 'Single')
                                        <select class="input--style-5" type="text" name="CivilStatus" required>
                                            <option selected>Single</option>
                                            <option>Married</option>
                                            <option>Widowed</option>
                                        </select>
                                    @elseif($youth[0]->CivilStatus == 'Married')
                                        <select class="input--style-5" type="text" name="CivilStatus" required>
                                            <option>Single</option>
                                            <option selected>Married</option>
                                            <option>Widowed</option>
                                        </select>
                                        @elseif($youth[0]->CivilStatus == 'Widowed')
                                        <select class="input--style-5" type="text" name="CivilStatus" required>
                                            <option>Single</option>
                                            <option >Married</option>
                                            <option selected>Widowed</option>
                                        </select>
                                    @endif
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
                                  @if($youth[0]->Scholarship == 'Scholar')
                                      <select class="input--style-5" type="text" name="Scholarship" required>
                                          <option selected>Scholar</option>
                                          <option>None</option>
                                      </select>
                                @elseif($youth[0]->Scholarship == 'None')
                                        <select class="input--style-5" type="text" name="Scholarship" required>
                                          <option>Scholar</option>
                                          <option selected>None</option>
                                        </select>
                                @endif
                                      <div class="select-dropdown"></div>
                                  </div>
                              </div>
                            </div>

                            <div class="col-2">
                                <div class="input-group">
                                <label class="label">Occupation</label>
                                    <input class="input--style-4" type="text" name="Occupation" value="{{$youth[0]->Occupation}}" >
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="input-group">
                                <label class="label">Sports(1)</label>
                                    <input class="input--style-4" type="text" name="Sports1" value="{{$youth[0]->Sports1}}" >
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="input-group">
                                <label class="label">(2)</label>
                                    <input class="input--style-4" type="text" name="Sports2" value="{{$youth[0]->Sports2}}" >
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="input-group">
                                <label class="label">(3)</label>
                                    <input class="input--style-4" type="text" name="Sports3" value="{{$youth[0]->Sports3}}" >
                                </div>
                            </div>
                            </div>
                            </div>


                            <div class="row row-space">
                            <!-- <div class="bttn"> -->
                            <div class="flex-parent jc-center">
                                        <!-- <div class="col-2"  id="sub"> -->
                                        <div class="col-2">
                                         <button class="button-5" role="button">Update</button>
                                        </div>
                        </form>
                                        <!-- <div class="col-2" id="cancel"> -->
                                        <div class="col-2">
                                        <form action="{{route('dashboardmain')}}" method="get">
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

.input55{
    background:#d9d9d9;
}

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

.font-robo {
  font-family: "Roboto", "Arial", "Helvetica Neue", sans-serif;
}

.font-poppins {
  font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif;
}


/* ==========================================================================
   #GRID
   ========================================================================== */
.row {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-flex-wrap: wrap;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
}

.row-space {
  -webkit-box-pack: justify;
  -webkit-justify-content: space-between;
  -moz-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
}

.col-2 {
  width: -webkit-calc((100% - 30px) / 2);
  width: -moz-calc((100% - 30px) / 2);
  width: calc((100% - 30px) / 2);
}

@media (max-width: 767px) {
  .col-2 {
    width: 100%;
  }
}
html {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

* {
  padding: 0;
  margin: 0;
}

*, *:before, *:after {
  -webkit-box-sizing: inherit;
  -moz-box-sizing: inherit;
  box-sizing: inherit;
}

/* ==========================================================================
   #RESET
   ========================================================================== */
/**
 * A very simple reset that sits on top of Normalize.css.
 */
body,
h1, h2, h3, h4, h5, h6,
blockquote, p, pre,
dl, dd, ol, ul,
figure,
hr,
fieldset, legend {
  margin: 0;
  padding: 0;
}

/**
 * Remove trailing margins from nested lists.
 */
li > ol,
li > ul {
  margin-bottom: 0;
}

/**
 * Remove default table spacing.
 */
table {
  border-collapse: collapse;
  border-spacing: 0;
}

/**
 * 1. Reset Chrome and Firefox behaviour which sets a `min-width: min-content;`
 *    on fieldsets.
 */
fieldset {
  min-width: 0;
  /* [1] */
  border: 0;
}

button {
  outline: none;
  background: none;
  border: none;
}

/* ==========================================================================
   #PAGE WRAPPER
   ========================================================================== */
.page-wrapper {
  min-height: 100vh;
}

body {
  font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif;
  font-weight: 400;
  font-size: 14px;
}

h1, h2, h3, h4, h5, h6 {
  font-weight: 400;
}

h1 {
  font-size: 36px;
}

h2 {
  font-size: 30px;
}

h3 {
  font-size: 24px;
}

h4 {
  font-size: 18px;
}

h5 {
  font-size: 15px;
}

h6 {
  font-size: 13px;
}

/* ==========================================================================
   #BACKGROUND
   ========================================================================== */
.bg-blue {
  background: #2c6ed5;
}

.bg-red {
  background: #fa4251;
}



.bg-gra-02 {
background-color: #f2f2f2;
}

/* ==========================================================================
   #SPACING
   ========================================================================== */
.p-t-100 {
  padding-top: 20px;
}

.p-t-130 {
  padding-top: 20px;
}

.p-t-180 {
  padding-top: 20px;
}

.p-t-20 {
  padding-top: 20px;
}

.p-t-15 {
  padding-top: 20px;
}
.btnanger{
  padding-top: 20px;
  background-color: red;
}

.p-t-10 {
  padding-top: 10px;
}

.p-t-30 {
  padding-top: 30px;
}

.p-b-100 {
  padding-bottom: 20px;
}

.m-r-45 {
  margin-right: 45px;
}

/* ==========================================================================
   #WRAPPER
   ========================================================================== */
.wrapper {
  margin: 0 auto;
}

.wrapper--w960 {
  max-width: 960px;
}

.wrapper--w780 {
  max-width: 780px;
}

.wrapper--w680 {
  max-width: 680px;
}

/* ==========================================================================
   #BUTTON
   ========================================================================== */
.btn {
  display: inline-block;
  line-height: 50px;
  padding: 0 50px;
  -webkit-transition: all 0.4s ease;
  -o-transition: all 0.4s ease;
  -moz-transition: all 0.4s ease;
  transition: all 0.4s ease;
  cursor: pointer;
  font-size: 18px;
  color: #fff;
  font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif;
}

.btn--radius {
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
}

.btn--radius-2 {
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
}

.btn--pill {
  -webkit-border-radius: 20px;
  -moz-border-radius: 20px;
  border-radius: 20px;
}

.btn--green {
  background: #57b846;
}

.btn--green:hover {
  background: #4dae3c;
}

.btn--blue {
  background: #4272d7;
}

.btn--blue:hover {
  background: #3868cd;
}

/* ==========================================================================
   #DATE PICKER
   ========================================================================== */
td.active {
  background-color: #2c6ed5;
}

input[type="date" i] {
  padding: 14px;
}

.table-condensed td, .table-condensed th {
  font-size: 14px;
  font-family: "Roboto", "Arial", "Helvetica Neue", sans-serif;
  font-weight: 400;
}

.daterangepicker td {
  width: 40px;
  height: 30px;
}

.daterangepicker {
  border: none;
  -webkit-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
  box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
  display: none;
  border: 1px solid #e0e0e0;
  margin-top: 5px;
}

.daterangepicker::after, .daterangepicker::before {
  display: none;
}

.daterangepicker thead tr th {
  padding: 10px 0;
}

.daterangepicker .table-condensed th select {
  border: 1px solid #ccc;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  font-size: 14px;
  padding: 5px;
  outline: none;
}

/* ==========================================================================
   #FORM
   ========================================================================== */
input {
  outline: none;
  margin: 0;
  border: none;
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  width: 100%;
  font-size: 14px;
  font-family: inherit;
}

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

.input--style-4::-webkit-input-placeholder {
  /* WebKit, Blink, Edge */
  color: #666;
}

.input--style-4:-moz-placeholder {
  /* Mozilla Firefox 4 to 18 */
  color: #666;
  opacity: 1;
}

.input--style-4::-moz-placeholder {
  /* Mozilla Firefox 19+ */
  color: #666;
  opacity: 1;
}

.input--style-4:-ms-input-placeholder {
  /* Internet Explorer 10-11 */
  color: #666;
}

.input--style-4:-ms-input-placeholder {
  /* Microsoft Edge */
  color: #666;
}

.label {
  font-size: 16px;
  color: #555;
  text-transform: capitalize;
  display: block;
  margin-bottom: 5px;
}

.radio-container {
  display: inline-block;
  position: relative;
  padding-left: 30px;
  cursor: pointer;
  font-size: 16px;
  color: #666;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}



.input-group {
  position: relative;
  margin-bottom: 22px;
}

.input-group-icon {
  position: relative;
}

.input-icon {
  position: absolute;
  font-size: 18px;
  color: #999;
  right: 18px;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
  cursor: pointer;
}

/* ==========================================================================
   #SELECT2
   ========================================================================== */
.select--no-search .select2-search {
  display: none !important;
}

.rs-select2 .select2-container {
  width: 100% !important;
  outline: none;
  background: #fafafa;
  -webkit-box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
  -moz-box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
  box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
}

.rs-select2 .select2-container .select2-selection--single {
  outline: none;
  border: none;
  height: 50px;
  background: transparent;
}

.rs-select2 .select2-container .select2-selection--single .select2-selection__rendered {
  line-height: 50px;
  padding-left: 0;
  color: #555;
  font-size: 16px;
  font-family: inherit;
  padding-left: 22px;
  padding-right: 50px;
}

.rs-select2 .select2-container .select2-selection--single .select2-selection__arrow {
  height: 50px;
  right: 20px;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}

.rs-select2 .select2-container .select2-selection--single .select2-selection__arrow b {
  display: none;
}

.rs-select2 .select2-container .select2-selection--single .select2-selection__arrow:after {
  font-family: "Material-Design-Iconic-Font";
  content: '\f2f9';
  font-size: 24px;
  color: #999;
  -webkit-transition: all 0.4s ease;
  -o-transition: all 0.4s ease;
  -moz-transition: all 0.4s ease;
  transition: all 0.4s ease;
}

.rs-select2 .select2-container.select2-container--open .select2-selection--single .select2-selection__arrow::after {
  -webkit-transform: rotate(-180deg);
  -moz-transform: rotate(-180deg);
  -ms-transform: rotate(-180deg);
  -o-transform: rotate(-180deg);
  transform: rotate(-180deg);
}

.select2-container--open .select2-dropdown--below {
  border: none;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  -webkit-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
  box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
  border: 1px solid #e0e0e0;
  margin-top: 5px;
  overflow: hidden;
}

.select2-container--default .select2-results__option {
  padding-left: 22px;
}

/* ==========================================================================
   #TITLE
   ========================================================================== */
.title {
  font-size: 24px;
  color: #525252;
  font-weight: 400;
  margin-bottom: 40px;
}

/* ==========================================================================
   #CARD
   ========================================================================== */
.card {
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  background: #fff;
}

.card-4 {
  background: #fff;
  -webkit-border-radius: 10px;
  -moz-border-radius: 10px;
  border-radius: 10px;
  -webkit-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
  box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
}

.card-4 .card-body {
  padding: 57px 65px;
  padding-bottom: 65px;
}

@media (max-width: 767px) {
  .card-4 .card-body {
    padding: 50px 40px;
  }
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
