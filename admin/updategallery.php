<link href="../style/dashboard.css" rel="stylesheet">

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

$page='gallery';
include('include/header.php');
if(isset($_POST['upload'])){

	$target="uploads/".basename($_FILES['img']['name']);
	$image=$_FILES['img']['name'];
	$folder="admin/uploads/".$image;


  $sql="INSERT INTO gallery (images) VALUES ('$folder')";
  mysqli_query($conn,$sql);
	

	if(move_uploaded_file($_FILES['img']['tmp_name'], $target)){
		$msg="Image Uploaded Successfully";
	}
	else
	{
		$msg="Failed To Upload Images";
	}

	

}


if(isset($_GET['del'])){
      $delete_id=$_GET['del'];
    
     $res=mysqli_query($conn,"DELETE FROM gallery WHERE id='$delete_id'");
     $_SESSION['message']="Record has been deleted!";
     $_SESSION['msg_typ']="danger"; 
      
}



?>



<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
 

            <h2>Gallery Maintain</h2>
  <br>


  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">ADD IMAGES</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">DELETE AND EDIT IMAGES</a>
    </li>
    
  </ul>

           
            
          </div>

          <?php
  if(isset($_SESSION['message'])):?>
    <div class="alert alert-<?=$_SESSION['msg_typ']?>">
      <?php
         echo $_SESSION['message'];
         unset($_SESSION['message']);
      ?>

    </div>
  <?php endif ?>

          <div class="tab-content">
    <div id="home" class="container tab-pane active">
      <h3>ADD IMAGES</h3>
      <form method="POST" action="" enctype="multipart/form-data">
  <div class="form-row">
          <div class="form-group">
    <label for="inputAddress2">Image</label>
    <input type="file" class="form-control" name="img" id="img" placeholder="Image" >
  </div>
</div>

<button type="submit" name="upload" class="btn btn-primary">Upload</button>
</form>

    </div>
    <div id="menu1" class="container tab-pane fade"><br>
      <h3>IMAGES</h3>
      <table class="table table-dark">

    <thead>
      <tr>
        <th scope="col">SN</th>
        <th scope="col">IMAGES</th>
        <th scope="col">TIME OR DATE</th>
        

      </tr>
    </thead>
    <tbody>
      <?php
      $selectqry="SELECT * FROM gallery ORDER BY id DESC";
	$result = mysqli_query($conn,$selectqry);
while($res=mysqli_fetch_assoc($result)){
      ?>
  
       <tr>
        <td align="text-center" style="color: white"><?php echo $res['id']?></td>
          <td align="text-center" style="color: white"><?php echo "<div class='col-lg-3 col-md-4 col-xs-6'>
    <a href='#' class='d-block mb-2 h-80'></a>
  <img src='../".$res['images']."' class='img-fluid img-thumbnail'/>
    </div>"; ?></td>
          
          <td align="text-center" style="color: white">2 hrs ago</td>
         
          <td align="text-center"><a href="imgupdate.php?edit=<?php echo $res['id']; ?> " class="btn btn-info">EDIT</a></td>
          <td align="text-center"><a href="updategallery.php?del=<?php echo $res['id']; ?>" onclick="return confirm('Are you sure?');" class="btn btn-danger">DELETE</a></td>
      </tr>
     <?php
 }
     ?>


    </tbody>
  </table>
    </div>






