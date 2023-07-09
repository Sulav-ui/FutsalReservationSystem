<?php
session_start();
include 'connection.php';

function checkreservation(){
  if(isset($_SESSION['user']))
    return true;
  return false;

}

if(!checkreservation()){
  header('Location:login.php');
}









?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-C ompatible" content="IE-Edge">

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="wlc.css">
  

  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300i,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/style.css">
</head>
<body data-spy="scroll" data-target="#navbarResponsive">
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
              <a class="nav-link" href="welcome.php">WELCOME PAGE</a>
            </li>

            


            <li class="nav-item">
              <a class="nav-link" href="logout.php">LOGOUT</a>
            </li>




          </ul>
        </div>
      </div>
    </nav>
  </div>
  <br>
  <br>
  <br>

  

 <div>
  <h3 style="color:  #505962" class="text-center">My Reservation</h3>

  <table class="table table-dark">

    <thead>
      <tr>
        <th scope="col">Count</th>
        <th scope="col">Name</th>
        <th scope="col">Phoneno</th>
        <th scope="col">Start_Time</th>
        <th scope="col">End_Time</th>
        <th scope="col">Reg_Date</th>

      </tr>
    </thead>
    <tbody>
      <?php

      $count=1;

      $sql="SELECT * FROM myguests WHERE Name = '$name' ORDER BY id DESC;";
      $result = mysqli_query($conn,$sql);
      while($row = mysqli_fetch_assoc($result)) { 
        
        
        ?>

        <tr>
          <th scope="row" align="text-center"><?php echo $count; $count++;?></th>
          <td align="text-center" style="color: white"><?php echo $row['Name'];?></td>
          <td align="text-center" style="color: white"><?php echo $row['Phone_no'];?></td>
          <td align="text-center" style="color: white"><?php echo $row['Start_time'];?></td>
          <td align="text-center" style="color: white"><?php echo $row['End_time'];?></td>
          <td align="text-center" style="color: white"><?php echo $row['reg_date'];?></td>
          <td align="text-center"><a href="edit.php?edit=<?php echo $row['id']; ?> ">EDIT</a></td>
          <td align="text-center"><a href="viewmyreservation.php?delete=<?php echo $row['id']; ?>">DELETE</a></td>
        </tr>
      <?php  }

      ?>



    </tbody>
  </table>
</div>

 
  
</body>
</html>

