<?php
session_start();
include('../dbh.php');


	if(isset($_POST['submit'])){
		
		$with_date =$_POST['with_date'];
		$member_id = $_POST['member_id'];
		$member_name = $_POST['member_name'];
		$withdraw_amount = $_POST['amount'];
		$area 		= $_POST['area'];
		$status 	= $_POST['status'];

		$getWithdraw = "SELECT withdraw_amount, withdraw_total FROM user_withdraw WHERE member_id='$member_id' ORDER BY withdraw_id DESC LIMIT 1;";
		$result = mysqli_query($conn, $getWithdraw);
		$row = mysqli_fetch_assoc($result);
		
		$withdrawAmount = $row['withdraw_total'] + $withdraw_amount;
		
		
		if(	$member_id == ''){
			$_SESSION['dep'] = "<div class='alert alert-danger'>Member id is Required.</div>";
			header("Location:../withdraw.php");
			exit();
		}	
		
		$sql = "INSERT INTO user_withdraw (date,member_id,	member_name,	withdraw_amount,	withdraw_total,	area,	status)
		values( '$with_date','$member_id','$member_name',$withdraw_amount,'$withdrawAmount','$area ','$status');";
		$query = mysqli_query($conn,$sql);
		
		
		
		$_SESSION['dep'] = "<div class='alert alert-success'>Data isnertead.</div>";
		header("Location: ../withdraw.php");

} else{
	$_SESSION['dep'] = "<div class='alert alert-danger'>Data not isnertead.</div>";
	header("Location:../withdraw.php");
}
?>