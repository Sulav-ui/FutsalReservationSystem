<?php
session_start();
$insertmsg='';
$usererr='';
$err='';
$time_error='';
include '../connection.php';
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
      
     $result=mysqli_query($conn,"SELECT * FROM myguests WHERE id='$id'") or die($mysql->error());
     while($row=mysqli_fetch_array($result))
     {
       
      $GLOBALS['nam'] =$row['Name'];
       $pono=$row['Phone_no'];
       $starttime=$row['Start_time'];
       $endtime=$row['End_time'];
       $regdate=$row['reg_date'];
       
  
}


     
   }


if(isset($_POST['Update'])){
    $nem=$GLOBALS['nam'];
 $id=$_GET['edit'];
 $name = $_POST['uname'];
 $phoneno = $_POST['pno'];
 $Start_time = $_POST['starttime'];
 $End_time = $_POST['endtime'];
 $date = $_POST['date'];
 if($name!==$nem){
  $usererr="Name must match username you registered";
}

      //checking the same date and time
      else if($name=== $nem){ 
$sql_u = "SELECT Start_time, End_time,reg_date FROM myguests WHERE Start_time='$Start_time' AND End_time='$End_time'AND reg_date='$date' AND NAME!='$nem'";
$res_u = mysqli_query($conn, $sql_u);
if (mysqli_num_rows($res_u) > 0) {
  $time_error = "Sorry...time is already booked";
}

else{

  $sql = "UPDATE myguests SET Name='$name',Phone_no='$phoneno',Start_time='$Start_time',End_time='$End_time',reg_date='$date' WHERE id=$id";


  if ($conn->query($sql) === TRUE) {
     $_SESSION['message']="Successfully edited!";
     $_SESSION['msg_typ']="danger"; 
   
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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
  <title>POPUP FORM</title>
      <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



</head>
<body>
<?php
  if(isset($_SESSION['message'])):?>
    <div class="alert alert-<?=$_SESSION['msg_typ']?>">
      <?php
         echo $_SESSION['message'];
         unset($_SESSION['message']);
      ?>

    </div>
  <?php endif ?>

<form method="POST">
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Update Info</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body mx-3">
        <div class="md-form mb-3">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="text" name="uname" class="form-control" id="name" placeholder="Name" value="<?php echo $GLOBALS['nam'] ;?>">
          <label data-error="wrong" data-success="right" for="defaultForm-email">Your Name</label><br>
          <span style="color: red"><h9><?php echo $usererr;?></h9></span>
        </div>

        <div class="md-form mb-3">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="text" name="pno" class="form-control" id="pno" placeholder="Phone Number"  value="<?php echo $pono;?>"> 
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Phone Number</label>
        </div>

       <div class="md-form mb-3">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="time" name="starttime" class="form-control" id="time" value="<?php echo $starttime;?>" > 
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Start Time</label><br>
          <span style="color: red"><h9><?php echo $time_error;?></h9></span>
        </div>

        <div class="md-form mb-3">
          <i class="fas fa-lock prefix grey-text"></i>
         <input type="time" name="endtime" class="form-control" id="time" value="<?php echo $endtime;?>"> 
          <label data-error="wrong" data-success="right" for="defaultForm-pass">End Time</label><br>
          <span style="color: red"><h9><?php echo $time_error;?></h9></span>
        </div>

        <div class="md-form mb-3">
          <i class="fas fa-lock prefix grey-text"></i>
         <input type="date" name="date" class="form-control" id="date" value="<?php echo $regdate;?>">  
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Reg_Date</label>
        </div>



      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-primary" name="Update">UPDATE</button>
      </div>
    </div>
  </div>
</div>
</form>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="text-center"  >
  <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm">LAUNCH
    UPDATE FORM</a>
</div>



</body>
</html>
