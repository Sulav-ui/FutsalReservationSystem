<?php
session_start();
$insertmsg='';
$usererr='';
$err='';
$time_error='';
include 'connection.php';

function checkadmin(){
  if(isset($_SESSION['user']))
   return true;
 return false;
 
}

 if(!checkadmin()){
  header('Location:login.php');
}



if(isset($_POST['submit'])){
 $name = $_POST['uname'];
 $phoneno=$_POST['pno'];
 $Start_time = $_POST['starttime'];
 $End_time = $_POST['endtime'];
 $date = $_POST['date'];


//check user 
 if($_SESSION['user']!== $name){
  $usererr="Name must match username you registered";
}


else if($_SESSION['user']=== $name){
   //checking the same date and times 
$sql = "SELECT * FROM myguests WHERE Start_time='$Start_time' AND End_time='$End_time' AND reg_date='$date'";
$res_u = mysqli_query($conn, $sql);
if (mysqli_num_rows($res_u) > 0) {
  $time_error = "Sorry...time is already booked";
}

else{

  $sql = "INSERT INTO myguests (Name,Phone_no,Start_time,End_time,reg_date)
  VALUES ('$name', '$phoneno', '$Start_time','$End_time','$date')";

  if ($conn->query($sql) === TRUE) {
     header('Location:messg.php');
   
 } else {
  $err= "Error: " . $sql . "<br>" . $conn->error;
}
}
}
}


?>








<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-C ompatible" content="IE-Edge">
  
  
  
  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="css/wlc.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300i,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    

    <link rel="stylesheet" href="css/style.css">
</head>

<body data-spy="scroll" data-target="#navbarResponsive">

  <!--- Start Home Section--->
  <div id="home">
    <!--- Navigation--->
    <nav class="navbar navbar-dark bg-dark navbar-expand-md fixed-top">
      <div class="container-fluid" >
         <a class="navbar-brand" href="#">
  <img id="logo" class="d-inline-block mr-1" alt="" src="img/log.jpg" style="  width: 50px;
    left: 15px; height: 50px"> 
    <div class="d-inline-block mr-1">FUTSALHUB</div>
</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
           
            
            <li class="nav-item">
              <a class="nav-link" href="#bookingsystem">BOOKING SYSTEM</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="viewmyreservation.php">VIEW MY RESERVATION</a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="logout.php">LOGOUT</a>
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
  <!--- End Home Section--->

  <!--- Start Service Section--->
  <div id="Services"><br>
   <div class="jumbotron">

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
s

</div>
<!--- End Jumbotron Section--->



</div>
<!--- End Service Section--->


<!--- Start booking system Section--->

<div id="bookingsystem">
  <div class="row">
    <div class="col-md-6">
      
     <div><h3 style="background-color: #505962;color: white;">Futsal Online Booking System</h3></div>
     
     <form class="form-container" action="" method="POST" id="form">

      
      <div class="form-group">
        <label> Name: </label>
        <input type="text" name="uname" class="form-control" id="name" placeholder="Name" required>
        <span style="color: red"><h9><?php echo $usererr;?></h9></span> 
      </div>



      <div class="form-group">
        <label> Phone no: </label>
        <input type="text" name="pno" class="form-control" id="pno" placeholder="Phone Number" required> 


      </div>



      <div class="form-group">
        <label> Start Time </label>
        <input type="time" name="starttime" class="form-control" id="time" required> 
        <span style="color: red"><h9><?php echo $time_error;?></h9></span> 
      </div>



      <div class="form-group">
        <label>End Time </label>
        <input type="time" name="endtime" class="form-control" id="time" required> 
        <span style="color: red"><h9><?php echo $time_error;?></h9></span> 
      </div>



      <div class="form-group">
        <label> Date </label>
        <input type="date" name="date" class="form-control" id="date"  required> 

      </div>


      
      <div class="form-group">
       <input type="submit" name="submit" value="Submit"  class="btn btn-primary btn-sm">
       
     </div>
     <span style="color: red"><h9><?php echo $err;?></h9></span> 
   </form>
   
   
 </div>

 

 



</div>



</div>


</div>






<!--- Start Contact and About Us Section--->
<div id="Contact"><br>
  <div id="container-fluid footer">
    <div class="row">
      <div class="col-md-6 text-center">
        <b><h3 style="color:white">ABOUT US</h3></b>
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

