<?php
session_start();
include '../connection.php';

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

     if($res==true){
     $_SESSION['message']="Record has been deleted!";
     $_SESSION['msg_typ']="danger";
        header('Location:dashboard.php');
}
}



?>