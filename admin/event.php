


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
$page='event';

include('include/header.php');

if(isset($_POST['upload'])){
  $dat=$_POST['date'];
  $card_title=$_POST['cardtitle'];
  $card_short_event=$_POST['message1'];
  $card_descpt_event=$_POST['message2'];
  $target="uploads/".basename($_FILES['img']['name']);
  $image=$_FILES['img']['name'];
  $folder="admin/uploads/".$image;
  

  if(move_uploaded_file($_FILES['img']['tmp_name'], $target)){
    $msg="Image Uploaded Successfully";
  }
  else
  {
    $msg="Failed To Upload Images";
  }

  $sql="INSERT INTO events (`card_title`,`card_text_short`,`Images`,`card_text_long`,`date`)
   VALUES ('$card_title','$card_short_event','$folder','$card_descpt_event','$dat')";
 if ($conn->query($sql) === TRUE){

   $_SESSION['message']="Record has been inserted successfully!";
     $_SESSION['msg_typ']="success";
     } 

     else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


}


if(isset($_GET['del'])){
      $delete_id=$_GET['del'];
    
     $res=mysqli_query($conn,"DELETE FROM events WHERE id='$delete_id'");
     $_SESSION['deletemsg']="Record has been deleted!";
     $_SESSION['msg']="danger"; 
      
}

  


?>
<link href="../style/dashboard.css" rel="stylesheet">


 <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h2>EVENT MANAGEMENT</h2>

   
            


  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#menu1">MENU 1</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2">MENU 2</a>
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


  <?php
  if(isset($_SESSION['deletemsg'])):?>
  <div class="alert alert-<?=$_SESSION['msg']?>">
      <?php
         echo $_SESSION['deletemsg'];
         unset($_SESSION['deletemsg']);
      ?>

</div>
<?php endif ?>

 <div class="tab-content">
    <div id="menu1" class="container tab-pane active">
      <h3>ADD EVENTS</h3>
      <form method="POST" action="event.php" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group">
      <label for="cardtitle">Card Title</label>
      <input type="text" class="form-control " name="cardtitle" id="cardtitle" placeholder="Card Title" >
    </div>
    
  </div>
 <div class="form-row">
<div class="form-group">
    <label for="shortevent">Event Short Text</label>
    <br>
    <textarea name="message1"  rows="3" cols="70"  placeholder="Enter text here...">
</textarea>
  </div>
</div>


 <div class="form-row">
  <div class="form-group">
    <label for="fullevent">Event Full Text</label>
    <br>
    <textarea  name="message2" rows="3" cols="70"   placeholder="Enter text here...">
</textarea>
  </div>
</div>


<div class="form-row">
  <div class="form-group">
    <label for="img">Image</label>
    <input type="file" class="form-control" name="img" id="img" placeholder="Image" >
  </div>
</div>

<div class="form-row">
    <div class="form-group">
      <label for="cardtitle">Date</label>
      <input type="date" class="form-control " name="date" placeholder="English Date Only" >
    </div>
    
  </div>

  
  <button type="submit" name="upload" class="btn btn-primary">Upload</button>
</form>


    </div>


    <div id="menu2" class="container tab-pane fade">
      <h3>DELETE AND EDIT EVENTS</h3>
      <table class="table table-dark">

    <thead>
      <tr>
        <th scope="col">SN</th>
        <th scope="col">Card Title</th>
        <th scope="rows">Card Short Text</th>
        <th scope="col">Images</th>
        <th scope="rows">Card Long Description</th>
        

      </tr>
    </thead>
    <tbody>
      <?php
      $count=1;
      $selectqry="SELECT * FROM events ORDER BY id DESC";
  $result = mysqli_query($conn,$selectqry);
while($res=mysqli_fetch_assoc($result)){
      ?>
  
       <tr>

        <td align="text-center"><?php echo $res['id']?></td>
        <td align="text-center" style="color: white"><?php echo $res['card_title'];?></td>
          <td align="text-center" style="color: white"><?php echo $res['card_text_short'];?></td>
          <td align="text-center" style="color: white"><?php echo "<div class='col-lg-3 col-md-4 col-xs-6'>
    <a href='#' class='d-block mb-2 h-100'></a>
  <img src='../".$res['Images']."' class='img-fluid img-thumbnail'/>
    </div>"; ?></td>
         <td align="text-center" style="color: white"><?php echo $res['card_text_long'];?></td> 
          
         
          <td align="text-center"><a href="evntedit.php?edit=<?php echo $res['id']; ?>" class="btn btn-info">EDIT</a></td>
          <td align="text-center"><a href="event.php?del=<?php echo $res['id']; ?>" onclick="return confirm('Are you sure?');" class="btn btn-danger">DELETE</a></td>
      </tr>
     <?php
 }
     ?>


    </tbody>
  </table>
    </div>



