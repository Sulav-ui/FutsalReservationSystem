<?php
session_start();
$insertmsg='';
$usererr='';
$err='';
$time_error='';
include 'connection.php';
$name=$_SESSION['user'];

function checkadmin(){
  if(isset($_SESSION['user']))
   return true;
 return false;
 
}

 if(!checkadmin()){
  header('Location:login.php');
}


   
     if(isset($_GET['edit'])){
      $id=$_GET['edit'];
    
     $res=mysqli_query($conn,"SELECT * FROM myguests WHERE id='$id'") or die($mysql->error());
     if(count($res==1)){
       $row=mysqli_fetch_array($res);
       $name=$row['Name'];
       $phoneno=$row['Phone_no'];
       $starttime=$row['Start_time'];
       $endtime=$row['End_time'];
       $regdate=$row['reg_date'];
  
}


     
   }



   if(isset($_POST['update'])){
   $sesname=$_SESSION['user']; 
 $id=$_GET['edit'];
 $name = $_POST['uname'];
 $phoneno = $_POST['pno'];
 $Start_time = $_POST['strtime'];
 $End_time = $_POST['endtime'];
 $date = $_POST['date'];
 if($_SESSION['user']!=$name){
  $usererr="Name must match username you registered";
}

      //checking the same date and time 
$sql_u = "SELECT Start_time, End_time,reg_date FROM myguests WHERE Start_time='$Start_time' AND End_time='$End_time'AND reg_date='$date' AND NAME!='$sesname'";
$res_u = mysqli_query($conn, $sql_u);
if (mysqli_num_rows($res_u) > 0) {
  $time_error = "Sorry...time is already booked";
}

else{

  $sql = "UPDATE myguests SET Name='$name',Phone_no='$phoneno',Start_time='$Start_time',End_time='$End_time',reg_date='$date' WHERE id=$id";


  if ($conn->query($sql) === TRUE) {
     header('Location:messg.php');
   
 } else {
  $err= "Error: " . $sql . "<br>" . $conn->error;
}
}
}


?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-C ompatible" content="IE-Edge">
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
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
        <a class="navbar-brand" href="#">Futsal</a>
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

    

  






<!--- Start booking system Section--->

<div id="bookingsystem">
  <div class="row">
    <div class="col-md-6">
      
     <div><h3 style="background-color: #505962;color: white;">Futsal Online Booking System</h3></div>
     
     <form class="form-container" action="" method="POST" id="form">

      
      <div class="form-group">
        <label> Name: </label>
        <input type="text" name="uname" class="form-control" id="uname" value="<?php echo $name;?>">
        <span style="color: green"><h9><?php echo $usererr;?></h9></span> 
      </div>



      <div class="form-group">
        <label> Phone no: </label>
        <input type="text" name="pno" class="form-control" id="pno" value="<?php echo $phoneno;?>"> 


      </div>



      <div class="form-group">
        <label> Start Time </label>
        <input type="time" name="strtime" class="form-control" id="starttime" value="<?php echo $starttime;?>"> 
        <span style="color: green"><h9><?php echo $time_error;?></h9></span> 
      </div>



      <div class="form-group">
        <label>End Time </label>
        <input type="time" name="endtime" class="form-control" id="endtime" value="<?php echo $endtime;?>"> 
        <span style="color: green"><h9><?php echo $time_error;?></h9></span> 
      </div>



      <div class="form-group">
        <label> Date </label>
        <input type="date" name="date" class="form-control" id="date"  value="<?php echo $regdate;?>"> 

      </div>


      
      <div class="form-group">
       <input type="submit" name="update" value="Update"  class="btn btn-primary btn-sm">
       
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











