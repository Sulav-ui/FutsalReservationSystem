<?php
function checkadmin(){
	if(isset($_SESSION['user']))
		return true;
	return false;
	
}

function checkreservation(){
	if(isset($_SESSION['user']))
		return true;
	return false;
	
}
