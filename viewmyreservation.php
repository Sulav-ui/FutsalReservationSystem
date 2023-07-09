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

$name=$_SESSION['user'];

if(isset($_GET['delete'])){
      $delete_id=$_GET['delete'];
    
     $res=mysqli_query($conn,"DELETE FROM myguests WHERE id='$delete_id'");
     $_SESSION['message']="Record has been deleted!";
     $_SESSION['msg_typ']="danger"; 
      
}



?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-C ompatible" content="IE-Edge">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
  <link rel="stylesheet" type="text/css" href="wlc.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh">

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

 <?php
  if(isset($_SESSION['message'])):?>
    <div class="alert alert-<?=$_SESSION['msg_typ']?>">
      <?php
         echo $_SESSION['message'];
         unset($_SESSION['message']);
      ?>

    </div>
  <?php endif ?>

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

      $sql="SELECT * FROM myguests WHERE Name = '$name' ORDER BY id DESC";
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
          <td align="text-center"><a href="edit.php?edit=<?php echo $row['id']; ?> " class="btn btn-info">EDIT</a></td>
          <td align="text-center"><a href="viewmyreservation.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');" class="btn btn-danger">DELETE</a></td>
        </tr>
      <?php  }

      ?>



    </tbody>
  </table>
</div>

  
  
</body>
</html>

