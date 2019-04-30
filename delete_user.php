<?php
	include('include/header.php');
	if(!isset($_SESSION['usertype'])){
	header("Location:login.php");
	exit();
}
?>


<div class="container sea_fild">
	
		<form action="delete_user.php" method="post">
			<div class="row">
				<div class="col-sm-6 form-group">
					<input class="form-control" type="text" name="search"  placeholder="search" />
				</div>
				<button type="submit" value="submit" name="submit-search" class="btn btn-default">Submit
			</div>
		</form>
</div>

<div class="container">
<?php echo isset($_SESSION['msg']) ? $_SESSION['msg']: '';?>
	<table border="2" width="100%">
		<thead>
			<tr>
				<th>#sl</th>
				<th>Photo</th>
				<th>ID</th>
				<th>Name</th>
				<th>MobileNo</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		
		<?php
			if(isset($_POST['submit-search'])){
				$txt = $_POST['search'];
				
				$sql = "SELECT * FROM  user_reg WHERE  	member_id = '$txt'  OR member_name LIKE '%$txt%' OR phone_num = '$txt';";
		
			}
			else{
				$sql = "SELECT * FROM user_reg;";
			}
			
			$result = mysqli_query($conn,$sql);
			$resultCheck = mysqli_num_rows($result);
			$i = 1;
			
			
			
			if($resultCheck > 0){
				while($row = mysqli_fetch_assoc($result)){

?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><img width="100" src= "images/profile_pic/<?php echo $row['photo'];?>"/></td>
				<td><?php echo $row['member_id'];?></td>
				<td><?php echo $row['member_name'];?></td>
				<td><?php echo $row['phone_num'];?></td>
				<td><a href="delete_user_success.php?id=<?php echo base64_encode($row['u_id']);?>" onclick="return confirm('Do you want to Delete.');">Delete</a></td>
			</tr>


<?php	
		$i++;
		}
	}
?>
			
			
		</tbody>
	</table>
</div>
<?php
	include('include/footer.php');
	unset($_SESSION['msg']);

?>