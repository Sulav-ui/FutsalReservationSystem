<?php
include 'connection.php';
if(isset($_POST['submit'])){
  $mess=$_POST['messg'];
  $sql = "INSERT INTO comments (comment)
  VALUES ('$mess')";
  if ($conn->query($sql) === TRUE) {
   
 }
 

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
              <a class="nav-link" href="index.php">HOME</a>
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
  </div>


  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4">Post Title</h1>

        <!-- Author -->
        <p class="lead">
          by
          <a href="#">FUTSAL HUB</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted on January 1, 2019 at 12:00 PM</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="img/card3.jpg" style="width: 900px; height: 300px;" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead">It is looking to help players develop their skills and excel in football and futsal.
            We use small sided games and futsal to enhance the player’s skills. We established the
            Futsal Academy to grow our player development program. If you are interested in enhancing your skills or becoming a college prospect, please free to contact us.</p>

        <p>Good players are not created overnight, but instead natural talent and ability must be nurtured in order to enable players to fulfill their potential. The processes that shape the success of sportspeople in any sport are conditioned by the player's response to the multiple environmental interactions and stimuli that are presented day by day.</p>

        <p>Talent identification is a key area within sports development. The identification of sports talent aims to detect, capture, select and promote the athlete who has the skills and competencies and thus the potential to ensure, as far as possible, the achievement of competitive success.</p>

        <blockquote class="blockquote">
          <p class="mb-0">Player development is all about players learning specific technical skills and beginning to understand tactical play.</p>
          <footer class="blockquote-footer">Someone famous in
            <cite title="Source Title">Source Title</cite>
          </footer>
        </blockquote>

        <p>Development of young players is a very systematic and complex process that is vital to the future of the player.17 Young players are put through very rigorous forms of football education including on-the job training (competitive matches) extensive of-the-job training (Physical conditioning) and cultural induction.</p>


        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form method="POST">
              <div class="form-group">
                <textarea class="form-control" rows="3" name="messg"></textarea>
              </div>
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>

        

        <!-- Comment with nested comments -->
        

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <br>
        <br>
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">Events</a>
                  </li>
                  <li>
                    <a href="#">Games</a>
                  </li>
                  <li>
                    <a href="#">Routines</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">Time</a>
                  </li>
                  <li>
                    <a href="#">Calender</a>
                  </li>
                  <li>
                    <a href="#">Tournaments</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-4 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">FUTSALHUB</p>
       <p class="m-0 text-center text-white">GOLFUTAR,KTM</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>




</body>
</html>