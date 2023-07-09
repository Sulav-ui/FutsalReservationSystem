<?php
session_start();
$msg='';
include '../connection.php';









if(isset($_POST['Login']))

{
 $name = $_POST['uname'];


 $password=$_POST['password'];

 
 if($name!=null && $password!=null){

  $sql="SELECT * FROM admin WHERE uname = '$name' AND password='$password'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $count=mysqli_num_rows($result);
  if($count==1){
    
    $_SESSION['user']=$name;

    header('Location:dashboard.php');

  }
  else
    $msg="Invalid username or password";
}




}

?>











<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-Edge">
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../css/global.css">

  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300i,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
   

    <link rel="stylesheet" href="../css/style.css">
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
            <legend style="color: white" class="the-legend"><b>Admin LogIn</b></legend>

              <span style="color: red"><h5><?php echo $msg;?></h5></span>

            <div class="form-group">
              <label style="color: white"> UserName </label>
              <input type="text" name="uname" class="form-control" id="name" placeholder="UserName" required> 
            </div>

            <div class="form-group">
              <label style="color: white"> Password </label>
              <input type="password" name="password" class="form-control" i placeholder="Password" required>
            </div>
            
            
            
            <input type="submit" name="Login" value="Login"  class="btn btn-primary btn-block">
            
            
          </fieldset>
          
        </form>

      </div>
    </div>
  </div>
 
  
 

 

  
</body>
</html>