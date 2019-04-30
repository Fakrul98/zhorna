<?php
session_start();
include('../dbh.php');
$_SESSION['POST'] = $_POST;

	if(isset($_POST['submit'])){
		
		$dep_date  = $_POST['dep_date'];
		$member_id = $_POST['member_id'];
		$member_name = $_POST['member_name'];
		$dep_amount = $_POST['amount'];
		$area 		= $_POST['area'];
		$status 	= $_POST['status'];
		
		$getDeposit = "SELECT dep_total FROM user_deposit WHERE member_id = '$member_id' ORDER BY deposit_id DESC LIMIT 1;";
		$result = mysqli_query($conn,$getDeposit);
		$row = mysqli_fetch_assoc($result);
	
		$total_depositAmount = $row['dep_total'] + $dep_amount;
		
		if(	$member_id == ''){
			$_SESSION['dep'] = "<div class='alert alert-danger'>Member id is Required.</div>";
			header("Location:../deposit.php");
			exit();
		}	
		
		if($dep_amount == ''){
			$_SESSION['dep']= "<div class='alert alert-danger'>Deposit Amount is Required.</div>";
			header("Location: ../deposit.php");
			exit();
		}
		
		$sql = "INSERT INTO user_deposit ( 	date, member_id,member_name,dep_amount,dep_total,area,dep_status)
		values('$dep_date', '$member_id','$member_name','$dep_amount','$total_depositAmount','$area ','$status' );";
		$query = mysqli_query($conn,$sql);
		
		
		
		$_SESSION['dep'] = "<div class='alert alert-success'>Data isnertead.</div>";
		header("Location: ../deposit.php");
}
else{
	$_SESSION['dep'] = "<div class='alert alert-danger'>Data not isnertead.</div>";
	header("Location:../deposit.php");
}
?>