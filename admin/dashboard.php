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

$page='dashboard';
include('include/header.php');








?>





        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            
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

      $sql="SELECT * FROM myguests ORDER BY id DESC";
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
          <td align="text-center"><a href="adminedit.php?edit=<?php echo $row['id']; ?> " class="btn btn-info">EDIT</a></td>
          <td align="text-center"><a href="admindelete.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');" class="btn btn-danger">DELETE</a></td>
        </tr>
      

<?php  }

      ?>

    </tbody>
  </table>
</div>



      

          <canvas class="my-4"  width="900" height="380">
            

         


          </canvas>
       

       

    <?php
    include('./include/footer.php');
    ?>