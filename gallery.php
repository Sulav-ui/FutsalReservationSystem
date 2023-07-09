<?php
      include 'connection.php';
     $sql="SELECT * FROM gallery";
     $result=mysqli_query($conn,$sql);
  
      
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
    
    

    
</head>
</head>
<body>
<div class="container">
  <h1 class="my-4 text-center text-warning">Futsal Image Gallery</h1>
  <div class="row text-center text-lg-left">
    <?php
    while($res=mysqli_fetch_assoc($result) ){
    
echo "<div class='col-lg-3 col-md-4 col-xs-6'>
    <a href='#' class='d-block mb-4 h-96'></a>
  <img src='".$res['images']."' class='img-fluid img-thumbnail'/>
    </div>";

}
     ?>


   


   </div>


    


    



      
    </div>



</body>
</html>