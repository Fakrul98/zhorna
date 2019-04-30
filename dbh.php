<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db_name = "zhor_db";
	
	$conn = mysqli_connect($host,$user,$pass,$db_name);
	
	if(!$conn){
		echo"Db not connected";
	}
?>