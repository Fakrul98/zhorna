<?php
	session_start();
	include("../dbh.php");
	$_SESSION['POST'] = $_POST;
	
	if(isset($_POST['submit'])){
		$member_id = $_POST['member_id'];
		$member_name = $_POST['member_name'];
		$loan_amount = $_POST['amount'];
		$loan_date = $_POST['loan_date'];
		$ref_member_id = $_POST['ref_mem_id'];
		$nid = $_POST['n_id'];
		$gender = $_POST['sex'];
		$area = $_POST['area'];
		$status = $_POST['status'];
		
		if($member_id ==='' ){
				$_SESSION['succ_msg'] = 'Member ID is not matched.';
				
				header("Location:../loan.php");
				
				exit();
			}
			
			if($member_name =='' ){
				$_SESSION['succ_msg'] = 'Member name is not matched.';
				header("Location:../loan.php");
				exit();
			}
			if($loan_amount < 5000 ) {
				$_SESSION['succ_msg'] = "Please insert a loan value";
				header("Location:../loan.php");
				exit();
			}
		
		$sql = "INSERT INTO loan (member_id,member_name, amount, date, ref_member_id, national_id, sex,area,status)
		values( '$member_id','$member_name','$loan_amount', '$loan_date', '$ref_member_id', '$nid', '$gender', '$area', '$status')";
		
		$query = mysqli_query($conn,$sql);
		
		$_SESSION['succ_msg'] ="Data insert successfully.";
		header("Location:../loan.php");
	}
	else{
		echo"Some Thing is wrong";
		header("Location:../loan.php");
	}
?>