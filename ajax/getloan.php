<?php
include('../dbh.php');

$member_id = $_POST['member_id'];


$sql = "SELECT * FROM user_reg WHERE member_id = '$member_id' LIMIT 1";

$sql_deposit = "SELECT SUM(dep_amount) as total_deposit FROM user_deposit WHERE member_id = '$member_id'";

$sql_withdraw = "SELECT SUM(withdraw_amount) as total_withdraw FROM user_withdraw WHERE member_id = '$member_id'";

$d_query = mysqli_query($conn,$sql_deposit);
$deposit = mysqli_fetch_assoc($d_query);

$w_query = mysqli_query($conn,$sql_withdraw);
$withdraw = mysqli_fetch_assoc($w_query);

$query = mysqli_query($conn,$sql);
$data = mysqli_fetch_assoc($query);

$array = ['name'=>$data['member_name'], 'n_id'=>$data['n_id'],'balance'=>$deposit['total_deposit'] - $withdraw['total_withdraw']];
#echo$data['photo'];
//echo $data['member_name'];

echo json_encode($array);
?>