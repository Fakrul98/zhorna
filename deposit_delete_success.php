<?php
	session_start();
	include("dbh.php");
?>
<?php	
	
	$id = $_GET['id'];
	
	$sql = "DELETE FROM user_deposit WHERE deposit_id = '$id'";
	
	$query = mysqli_query($conn,$sql);
	
	if($query){
		$_SESSION['msg'] = "<div class='alert alert-success'>Delete successfuly.</div>";
	}
	else{
		$_SESSION['msg'] = "<div class='alert alert-danger'>Unable to delete .</div>";
	}
	
	header("Location: deposit_delete.php");
?>
