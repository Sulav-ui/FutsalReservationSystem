<?php
session_start();
include 'connection.php';
$msg='';
$name_error='';
if(isset($_POST['submit']))

{

    $name = $_POST['uname'];
    

   $password=md5($_POST['password']);

if($name!=null && $password!=null){


//checking the same username 
   	$sql_u = "SELECT * FROM user_login WHERE username='$name'";
   	$res_u = mysqli_query($conn, $sql_u);
   	if (mysqli_num_rows($res_u) > 0) {
  	  $name_error = "Sorry... username already taken";
}
else{

      $sql = "INSERT INTO user_login (username,password)
VALUES ('$name','$password')";

if ($conn->query($sql) === TRUE) {
  $_SESSION['user']=$name;
    header('Location:welcome.php');
} else {
    $msg= "Error: " . $sql . "<br>" . $conn->error;
}
    
}

   }

   

}




?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE-Edge">
 
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/global.css">
   <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300i,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    

    <link rel="stylesheet" href="css/style.css">
<style>
  body{
    background-color: #505962;
  }
</style>
</head>
<body>
<div class="container-fluid bg">
  <div class="row justify-content-center">
    <div class="col-12 col-sm-6 col-md-3">
      <form action="" method="POST" id="form" class="form-container">

  
  <fieldset class="the-fieldset">
  <legend style="color: white" class="the-legend"><b>Register</b></legend>



  <div class="form-group">
  <label style="color: white"> UserName </label>
    <input type="text" name="uname" class="form-control" id="name" placeholder="UserName" required>
    <span style="color: red"><h9><?php echo $name_error;?></h9></span> 
</div>

   <div class="form-group">
  <label style="color: white"> Password </label>
  <input type="password" name="password" class="form-control" i placeholder="Password" required>
  
 </div>
  
   
           
           <input type="submit" name="submit" value="Submit"  class="btn btn-primary btn-block">
           <span style="color: red"><h9><?php echo $msg;?></h9></span>
           
           
    </fieldset>
          
          </form>

    </div>
  </div>
 </div>




  
</body>
</html>

