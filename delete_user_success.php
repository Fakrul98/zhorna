<?php
session_start();
include('dbh.php');
?>

<?php
	$id = base64_decode($_GET['id']);
	$sql = "DELETE FROM user_reg WHERE u_id = '$id'";
	$query = mysqli_query($conn,$sql);
	
	if($query){
		$_SESSION['msg'] = "Delete successfuly.";
	}
	else{
		$_SESSION['msg'] = "Unable to Delet Data.";
	}
	
	header("Location: delete_user.php");
?>