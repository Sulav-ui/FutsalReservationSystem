<?php
if(isset($_POST['BookNow'])){
  header('Location:login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-C ompatible" content="IE-Edge">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  
 
  <link rel="stylesheet" type="text/css" href="css/new.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


   <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300i,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    

    <link rel="stylesheet" href="css/style.css">
</head>
</head>
<body data-spy="scroll" data-target="#navbarResponsive">

  <!--- Start Home Section--->
  <div id="home">
    <!--- Navigation--->
    <nav class="navbar navbar-dark bg-dark navbar-expand-md fixed-top">
      <div class="container-fluid" >
        <a class="navbar-brand" href="#">Futsal</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link">HOME</a>
            </li>

             <li class="nav-item">
              <a class="nav-link" href="events.php">EVENTS</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="gallery.php">GALLERY</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#Services">SERVICES </a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="admin/adminlogin.php">ADMIN LOGIN</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#Contact">CONTACT</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">LOGIN</a>
            </li>




          </ul>
        </div>
      </div>
    </nav>

    <!--- Start Landing page--->
    <div class="landing">
      <div class="home-wrap">
        <div class="home-inner">


           </div>

    </div>
    </div>
    <!--- Start Landing page Caption--->
    <div class="caption center-block text-center">
      <a class="btn btn-outline-light" href="#Services">Get Started</a>
    </div>
  </div>


  <div id="futsalinfo">
    <div class="container-fluid bg">
  <div class="row justify-content-center">
     
<div class="card card-block" style="width:40rem;">
          
          <div class="card-body">
            <h4 class="card-title display-4"><p><h2 class="text-left text-white bg-dark">Futsal Hub Info</h2></p>
            <p class="card-text"> 
              <div class="justify-content-center"><p>Name:Futsal Hub</p></div>
               <div class="justify-content-center"><p>Location:Golfutar,Kathmandu</p></div>
               <div class="justify-content-center"><p>Number of fields:2</p></div>
               <div class="justify-content-center"><p>Facilities:Cafe,Swimming pool</p></div>
               <div class="justify-content-center"><p>Contact:01-4378418</p></div><br>


                <div class="justify-content-center"><b>Booking Prices</b></div>

             
               
               <table class="table table-striped table-dark">
  <thead>
    <tr>
       <th scope="col">Timings</th>
      <th scope="col">Morning
      (6am-12am)</th>
      <th scope="col">Afternoon
      (12pm-5pm)</th>
      <th scope="col">Evening
      (5pm-9pm)</th>
      <th scope="col">Promotions
      (Saturdays)</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Rates</th>
      <td>1200</td>
      <td>1200</td>
      <td>1600</td>
      <td>2000</td>
    </tr>
    
   
  </tbody>
</table>
<form method="POST">

<div class="justify-content-center"><input type="submit" name="BookNow" value="Book Now"  class="btn btn-primary btn-block"></div>
</form>
            </p>
          </div>


        </div>

            


  

 
  </div>
 </div>
  </div>

  
  <!--- End Home Section--->

<!--- Start Event Section--->
 <div class="jumbotron jumbotron-fluid">
  <div class="container container-fluid">
    <div class="row">
    
            <div class="col-md-5">
               <div class="row ">
               &nbsp; &nbsp;  &nbsp;  &nbsp;<h4 class="text-white bg-danger">FEATURED NEWS</h4>
              
              <div class="card card-block" style="width:320px height:200px">
        <img class="card-img-top" src="img/card1.jpg" alt="Card image" style="width:100%">
          <div class="card-body">
            <h4 class="card-title">Sports Marketing</h4>
            <p class="card-text"> 
              Futsal is always looking for ways to promote Bermudian football and futsal locally and Internationally.
            </p>
            <a href="#" class="btn btn-primary">See Profile</a>
          </div>
        </div>
           
             
              </div>


              
              </div>
  
  <div class="col-md-6">
               <div class="row ">
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <h4 class="text-white bg-danger">UPCOMING EVENTS</h4>

               <div class="card card-block" style="width:200px height:200px">
        
          <div class="card-body">
            <h4 class="card-title">Sports Marketing</h4>
            <p class="card-text"> 
              Futsal is always looking for ways to promote Bermudian football and futsal locally and Internationally.
            </p>
            <a href="#" class="btn btn-primary">See Profile</a>
          </div>
        </div>

        <div class="card card-block" style="width:200px height:200px">
        
          <div class="card-body">
            <h4 class="card-title">Sports Marketing</h4>
            <p class="card-text"> 
              Futsal is always looking for ways to promote Bermudian football and futsal locally and Internationally.
            </p>
            <a href="#" class="btn btn-primary">See Profile</a>
          </div>
        </div>





              
              </div>


              </div>


              
              </div>


            
            

</div>
  </div>


<!--- End Event Section--->


  <!--- Start Service Section--->
  <div id="Services">
   <div class="jumbotron jumbotron-fluid">

     <h3 class="heading text-center">Services</h3><br>
     <div class="row equal">
      <div class="col-md-4  d-flex pb-3 text-center">
        <div class="card card-block" style="width:400px">
          <img class="card-img-top" src="img/card1.jpg" alt="Card image" style="width:100%">
          <div class="card-body">
            <h4 class="card-title">Football / Futsal Events</h4>
            <p class="card-text"> 
            It host events relating to football and futsal. We try to provide a memorable entertainment experience for all those participating, watching or investing in football / futsal.</p>
            <a href="#" class="btn btn-primary">See Profile</a>
          </div>
        </div>




      </div>

      <div class="col-md-4  d-flex pb-3 text-center">
        <div class="card card-block" style="width:400px">
          <img class="card-img-top" src="img/card2.png" alt="Card image" style="width:100%">
          <div class="card-body">
            <h4 class="card-title">Sports Marketing</h4>
            <p class="card-text"> 
              Futsal is always looking for ways to promote Bermudian football and futsal locally and Internationally.
            </p>
            <a href="#" class="btn btn-primary">See Profile</a>
          </div>
        </div>

        

      </div>

      <div class="col-md-4  d-flex pb-3 text-center">

       <div class="card card-block" style="width:400px">
        <img class="card-img-top" src="img/card3.jpg" alt="Card image" style="width:100%">
        <div class="card-body">
          <h4 class="card-title">Player Development</h4>
          <p class="card-text"> 
            It is looking to help players develop their skills and excel in football and futsal.
            We use small sided games and futsal to enhance the player’s skills. We established the
            Futsal Academy to grow our player development program. If you are interested in enhancing your skills or becoming a college prospect, please free to contact us.
          </p>
          <a href="#" class="btn btn-primary">See Profile</a>
        </div>
      </div>



    </div>






  </div><!--- End Row Section--->


</div>
<!--- End Jumbotron Section--->



</div>
<!--- End Service Section--->




<!--- Start Gallery Section--->



  
    




<!--- End Gallery Section--->




<!--- Start Contact and About Us Section--->
<div id="Contact"><br>
  <div id="container-fluid footer">
    <div class="row">
      <div class="col-md-6 text-center">
       <b> <h3 style="color:white">ABOUT US</h3></b>
        <p style="color: darkgrey">Provide online tools for reservation futsal court</p>
      </div>

      <!--For contact Section-->
      <div class="col-md-6 text-center">
       <b><h3 style="color:white">CONTACT</h3></b>
       <i class="fa fa-envelope fa-1x" style="color: darkgrey"><a href="#" style="color:white font-size:2px">&nbsp; &nbsp;<b>futsal@support.com</b></a></i><br>
       <i class="fa fa-phone fa-1x " style="color: darkgrey">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>01-4378418</b></i><br>
       <i class="fa fa-map-marker fa-1x" style="color: darkgrey"> &nbsp;&nbsp;<b>Golfutar,Kathmandu</b></i>


     </div>







   </div><!--- End Row Section--->

 </div><!--- End Container fluid footer Section--->


</div><!--- End Contact Section--->



  




</body>
</html>