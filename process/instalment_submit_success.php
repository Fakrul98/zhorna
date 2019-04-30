<?php
session_start();
include("../dbh.php");
	$_SESSION['POST'] = $_POST;
	if(isset($_POST['submit'])){
		
		$ins_date = $_POST['ins_date'];
		$member_id = $_POST['member_id'];
		$member_name = $_POST['member_name'];
		$per_inst = $_POST['perIns'];
		$area = $_POST['area'];
		
		$getLoan = "SELECT amount FROM loan WHERE member_id = '$member_id' ORDER BY loan_id DESC LIMIT 1";
		$result = mysqli_query ($conn,$getLoan);
		$row = mysqli_fetch_assoc($result);
		
		$getInstalment  = "SELECT due_inst FROM instalment WHERE member_id = '$member_id' ORDER BY ins_id DESC LIMIT 1;";
		$results = mysqli_query($conn,$getInstalment);
		$rows = mysqli_fetch_assoc($results);
		
		if($rows['due_inst']== 0 ){
			$due = $row['amount'] - $per_inst;
		}elseif($rows['due_inst'] > 0 ){
			$due = $rows['due_inst'] - $per_inst;
		}
		
		if($member_id ==='' ){
				$_SESSION['succ_msg'] = "<div class='alert alert-danger'>Member ID is not matched.</div>";		
				header("Location:../instalment.php");	
				exit();
			}
			
		if($per_inst ==''){
			$_SESSION['succ_msg'] = "<div class=' alert alert-danger'>instalment amount is Required!.</div>";		
				header("Location:../instalment.php");	
				exit();
		}
			
			$sql = "INSERT INTO instalment (date ,	member_id ,	member_name ,per_inst ,	due_inst ,area 	) values( '$ins_date','$member_id','$member_name','$per_inst', '$due', '$area')";	
		$query = mysqli_query($conn,$sql);
		
		$_SESSION['succ_msg'] ="<div class='alert alert-success'>Data insert successfully.</div>";
		header("Location:../instalment.php");
		
	}
	else{
		echo"Some Thing is wrong";
		header("Location:../instalment.php");
	}
	
?>