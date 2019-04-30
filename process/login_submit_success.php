<?php
session_start();
include("../dbh.php");
$usertype = ['Super Admin' , 'Admin', 'Editor'];
$email = $_POST['email'];
$pwd   = md5($_POST['password']);

$sql = "SELECT * FROM login WHERE email = '$email' AND password ='$pwd ';";

$query = mysqli_query($conn,$sql);
$data = mysqli_fetch_assoc($query);


if($data > 0 ){
	if($data['password']==$pwd ){
		$_SESSION['loginid'] = $data['login_id'];
		$_SESSION['username'] = $data['user_name'];
		$_SESSION['userid'] = $data['user_id'];
		$_SESSION['usertype'] = $data['user_type'];
		$_SESSION['email'] = $data['email'];
		header("Location: ../index.php");
		exit();
	}
	else{
		$_SESSION['msg'] = "<div class='alert alert-danger'>Invalid Password!</div>";
	}
}
$_SESSION['msg'] = "<div class='alert alert-danger'>You are not allowed access for this!</div>";
header("Location: ../index.php");

?>