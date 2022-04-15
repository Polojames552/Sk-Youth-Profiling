<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SK Youth Profiling</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link rel="stylesheet" href="css/sample.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"><!-- slideshow -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script><!-- slideshow responsive -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script><!-- slideshow responsive -->
      

      <!-- Public CSS-->
        <!-- <link rel="stylesheet" href="style.css"> -->
        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased" style="background-image: url('image/try.jpg');">
           <!-- @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth

            @endif -->


            <nav class="navbar">
                <img class="pic" src="image/sklogo.png" style="width:60px">

              <h2 class="brand-title">Barangay San Julian</h2>
              <a href="#" class="toggle-button">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
              </a>
              <div class="navbar-links">
                <ul>
               
                
                @if (Route::has('login'))
                    @auth
                    <li> <a class="add" href="{{ route('login') }}"><i class="fa fa-fw fa-user"></i>Go to Dashboard</a></li>
                    @else
                    <li> <a class="add" href="{{ route('login') }}"><i class="fa fa-fw fa-user"></i> Administator</a></li>
                    @endauth
                @endif

   
                </ul>
              </div>
            </nav>


<div class="SKcover">
  <img src="image/SKcover.png" width="100%" height="180px">
</div>



<div class="fill">
<div class="flex-parent jc-center">
<div class="download-btn">
    <!-- <div class="download-btn-icon">
        <i class="fa fa-pencil-square-o fa-3x"></i>
    </div>
     <div class="download-btn-text">
        <h3>Fill Up Form</h3>
        <h5>for barangay San Julian Youth's.</h5>
    </div> -->

    <!-- HTML !-->
    <!-- <form action="{{ route('SKform') }}" method="get">
    
         <button class="button-33" role="button"><i class="fa fa-file-text"></i> Fill Up Form</button>
    </form> -->

<!-- HTML !-->
  <br>
    <form action="{{ route('SKform') }}" method="get">
        <button class="button-71" role="button"><i class="fa fa-file-text"></i> Fill Up Form</button>
    </form> 



</div>
</div>
</div>

<br>

<center>

<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="image/pic1.png" style="height:250px;"  width="100%">
      </div>

      <div class="item">
        <img src="image/sanjulian.jpg" style="height:250px;"  width="100%">
      </div>

      <div class="item">
        <img src="image/sk.jpg" style="height:250px;"  width="100%">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</center>
<br>
<br>
<center>
 <div class="card1">
  <div class="anno">
  <img src="image/announ2.png"style="height:70px;" width="250px;">
    <!-- <h2   id="Announcement"><i class="fa fa-bullhorn" id="horn1"></i>Announcement!</h2></i> -->
    <!-- <h2 id="Announcement"></i>Announcement!</h2></i> -->
<br><br>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
       Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
       Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
      Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    <a target="_blank" href="tryit.asp?filename=trycss_text">"Try it Yourself"</a> link.</p>
  </div>
  </div>
  <br>

</center>
</div>



<div class="row">
        <div class="card-02">
        <b><h2 class="www">Vision</h2></b>
 
 <p>We envisioned Barangay San Julian 
    as a Developed & Progressive Barangay  with people </p> 
  <center><b>"WHO ARE UNITED & GOD LOVING"</b></center>

        </div>

        
        <div class="card-02" id="mission">
        
        <b><h2 class="www">Mission</h2></b>
    <p> Barangay  <b>SAN JULIAN</b> is committed to promote the General 
       welfare of the people and to enhance the socio-economic condition of the people
       through delivery of basic services and to 
       encourage people's participation towards a progressive community.</p>
     
      </div>
      </div>
<br>
<br>
      <!-- <h2>Sangguniang Kabataan Officials</h2>


<center>

      <div class="row">
  <div class="column01">
    <div class="card01">
      <img src="image/sklogo.png" alt="Jane" style="height:30%;" width="50%;">
      <div class="container01">
        <h2>Jane Doe</h2>
        <p class="title">SK Chairman</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>example@example.com</p>
        <button class="button">Contact</button>
      </div>
    </div>
  </div>

  <div class="column01">
    <div class="card01">
      <img src="image/sklogo.png" alt="Mike" style="height:30%;" width="50%;">
      <div class="container01">
        <h2>Mike Ross</h2>
        <p class="title">Art Director</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>example@example.com</p>
        <button class="button">Contact</button>
      </div>
    </div>
  </div>
  
  
  <div class="column01">
    <div class="card01">
      <img src="image/sklogo.png" alt="John" style="height:30%;" width="50%;"s>
      <div class="container01">
        <h2>John Doe</h2>
        <p class="title">Designer</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>example@example.com</p>
        <button class="button">Contact</button>
      </div>
    </div>
  </div>
</div>
</center> -->
      <br>
      <br>
      <footer>
      <img class="pic" src="image/sklogo.png" style="width:100px">
        <p ><a id="fb" class='fab fa-facebook-f' href="https://www.facebook.com/sangguniang.kabataan.984349">SK San Julian</a></p>
        <p> Baranggay San Julian Irosin, Sorsogon</p>
        <p><a  class="fa fa-copyright"></a>Sangguniang Kabataan (2022) All Rights Reserved.</p>

      </footer>
      
<style>

/* .column01 {
  float: left;
  width: 23.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

@media screen and (max-width: 650px) {
  .column01 {
    width: 80%;
    display: block;
  }
}

.card01 {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  background-color: white;
}

.container01 {
  padding: 0 16px;
}

.container01::after, .row::after {
  content: "";
  clear: both;
  display: table;
} */

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color:#006699;
  text-align: center;
  cursor: pointer;
  width: 100%;
 
}

.button:hover {
  background-color: #555;
}





.container{
  margin: 20px;
}

.row{
  width: 100%;
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
}

.card-02{
  background: white;
  position: relative;
  flex: 1;
  max-width: 660px;
  height: 160px;
  margin: 10px;
  border-radius: 5px;
  
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}


@media (max-width:800px){
  #mission{
    height: 230px;
  }
  .card-02{
    flex: 100%;
    max-width: 380px;
  }
  .c02{
    font-size: 8px;
  }
.www{
  font-size: 18px;
}

}

  .vis{
    height: 135px;
  }
 
  #Announcement{
    color: black;
  }
  #horn1{
    color: #ff3333;
  }

.navbar {
    display: flex;
    position: relative;
    justify-content: space-between;
    text-align: center;
    /* background-color: #000066; */
    background-color:#006699;
    height: 100%;
    height: 63px;
    padding-top: 4px;
    color: white;

}

.line {

    background-color: #000066;
    height: 5px;


}

.brand-title {
  padding-top: 10;
  margin-top: 15px;
    font-size: 22px;
    text-align: center;

}

.navbar-links {
    height: 100%;
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    text-align: center;
    text-decoration: none;
    font-size: 17px;
}

.navbar-links ul {
    display: flex;
    margin: 0;
    padding: 0;
    text-align: center;
}

.navbar-links li {
    list-style: none;
}

.navbar-links li a {
    display: block;
    text-decoration: none;
    color: white;
    padding: 1rem;

}

.navbar-links li:hover {
    /* background-color: #00004d; */
    background-color: #0077b3;
}

.toggle-button {
    position: absolute;
    top: 20px;
    right: 1rem;
    display: none;
    flex-direction: column;
    justify-content: space-between;
    width: 20px;
    height: 15px;
}

.toggle-button .bar {
    height: 3px;
    width: 100%;
    background-color: white;
    border-radius: 10px;
}

@media (max-width: 800px) {
    .navbar {
        flex-direction: column;
        align-items: flex-start;

    }
 
  .missiontxt{
    font-size: 8px;
    height: 5px;
  }


    .brand-title {
    padding-left: 80px;

    }

    .toggle-button {
        display: flex;
    }

    .navbar-links {
        display: none;
        width: 100%;
        height: 200px;
        color: inherit;

    }
    .add{
     margin-left: 50px;
    }

    .navbar-links ul {
        width: 100%;
        flex-direction: column;

    }

    .navbar-links ul li {
        text-align: center;
    }

    .navbar-links ul li a {

    }

    .navbar-links.active {
        display: flex;
    }

   .misvis{
    float: inherit;
    display: block;
    text-align: center;
    text-decoration: none;
    font-size: 8px;
    height: 100%;
   }

   footer p {
    padding: 5px 0;
    text-align: center;
    color: white;
    font-size: 10px;
}
/* .card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #f1f1f1;
}
.column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  } */

}




.button-71 {
  background-color: #0078d0;
  border: 0;
  border-radius: 56px;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  font-family: system-ui,-apple-system,system-ui,"Segoe UI",Roboto,Ubuntu,"Helvetica Neue",sans-serif;
  font-size: 18px;
  font-weight: 600;
  outline: 0;
  padding: 16px 21px;
  position: relative;
  text-align: center;
  text-decoration: none;
  transition: all .3s;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-71:before {
  background-color: initial;
  background-image: linear-gradient(#fff 0, rgba(255, 255, 255, 0) 100%);
  border-radius: 125px;
  content: "";
  height: 50%;
  left: 4%;
  opacity: .5;
  position: absolute;
  top: 0;
  transition: all .3s;
  width: 92%;
}

.button-71:hover {
  box-shadow: rgba(19, 183, 208, 0.8) 0 3px 15px inset, rgba(19, 183, 208, 0.8) 0 3px 5px, rgba(80, 208, 228, 0.8) 0 10px 13px;
  transform: scale(1.05);
}

@media (min-width: 768px) {
  .button-71 {
    padding: 16px 48px;
  }
}




/* .column {
  float: left;
  width: 50%;
  padding: 10px;
  
}

.row:after {
  content: "";
  display: table;
  clear: both;
  padding-bottom: 30px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #f1f1f1;
} */
.card1 {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color:white;
  width: 100%;
}


</style>



<script>
const toggleButton = document.getElementsByClassName('toggle-button')[0]
const navbarLinks = document.getElementsByClassName('navbar-links')[0]

toggleButton.addEventListener('click', () => {
  navbarLinks.classList.toggle('active')
})


var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}


</script>

    </body>
</html>
