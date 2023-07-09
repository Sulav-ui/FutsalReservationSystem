   <?php
   session_start();
   include '../connection.php';

   function checkadmin(){
  if(isset($_SESSION['user']))
   return true;
 return false;
 
}

 if(!checkadmin()){
  header('Location:adminlogin.php');

}

   if(isset($_GET['edit'])){
      $id=$_GET['edit'];

      
     $result=mysqli_query($conn,"SELECT images FROM gallery WHERE id='$id'") or die($mysql->error());
     while($row=mysqli_fetch_array($result))
     {
       
      $GLOBALS['img'] =$row['images'];
       
       
  
}


     
   }

   if(isset($_POST['Update'])){
    
    $id=$_GET['edit'];

  $target="uploads/".basename($_FILES['image']['name']);
  $image=$_FILES['image']['name'];
  $folder="admin/uploads/".$image;
  

  if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
    $msg="Image Uploaded Successfully";
  }
  else
  {
    $msg="Failed To Upload Images";
  }

    $sql = "UPDATE gallery SET images='$folder' WHERE id=$id";


  if ($conn->query($sql) === TRUE) {
     $_SESSION['message']="Successfully edited!";
     $_SESSION['msg_typ']="danger"; 
   
 } else {
  $err= "Error: " . $sql . "<br>" . $conn->error;
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

<form method="POST" action="" enctype="multipart/form-data">
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
          <i class="fas fa-lock prefix grey-text"></i>

          <label data-error="wrong" data-success="right" for="defaultForm-pass">Image</label>
          <input type="file" name="image"  class="form-control" id="img"   value="<?php echo $GLOBALS['img'] ;?>"> 
          
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
