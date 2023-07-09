<?php

if(isset($_POST['submit']))

{

    $date = $_POST['date'];

   $time=$_POST['time'];

   echo $date +'<br>';
   echo $time;
}
?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST">
	Date:<input type="date" name="date">
	Time:<input type="time" name="time">
	<input type="submit" name="submit">
</form>
</body>
</html>