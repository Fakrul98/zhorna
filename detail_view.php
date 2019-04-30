<?php
	include('include/header.php');
?>

<div class="container sea_fild">
	
		<form action="member_list.php" method="post">
			<div class="row">
				<div class="col-sm-6 form-group">
					<input class="form-control" type="text" name="search"  placeholder="search" />
				</div>
				<button type="submit" value="submit" name="submit-search" class="btn btn-default">Submit
			</div>
		</form>
</div>

		
<?php
	$id =  @base64_decode($_GET['id']);
	
	$sql = "SELECT * FROM user_reg  WHERE u_id = '$id'";
	
	$query = mysqli_query($conn,$sql);
	$queryResult = mysqli_num_rows($query);
	if($queryResult > 0 ){
		while($row = mysqli_fetch_assoc($query)){
?>
<div class="container">
	<table Width="100%" border="2">
 		
		   <tr><td>Id</td><td><?php echo $row['u_id']?></td></tr>
			<tr><td>photo</td>	<td> <img width="100" src= "images/profile_pic/<?php echo $row['photo'];?>"/> </td></tr>
			<tr><td>Member Id</td>	<td> <?php echo $row ['member_id'];?> </td></tr>
			<tr><td>Member name</td> <td> <?php echo $row ['member_name'];?></td></tr>
			<tr><td>Father Name</td> <td> <?php echo $row ['fa_name'];?> </td></tr>
			<tr><td>Mother Name</td> <td> <?php echo $row ['mo_name'];?> </td></tr>
			<tr><td>Addres </td>	  <td> <?php echo $row ['address'];?> </td></tr>
			<tr><td>Email </td>	     <td> <?php echo $row ['email']; ?>  </td></tr>
			<tr><td>Phone </td>	     <td> <?php echo $row ['phone_num'];?></td></tr>
			<tr><td>JoinDate </td>	 <td> <?php echo $row ['da_birth'];?> </td></tr>
			<tr><td>National Id</td>  <td> <?php echo $row ['n_id'];?>    </td></tr>
			<tr><td>Gender</td>	      <td> <?php echo $row ['sex'];?>     </td></tr>
			<tr><td>Area</td>	      <td> <?php echo $row ['area'];?>    </td></tr>
		
	</table>	
</div>
<?php			
		}
	}
?>


<?php 
	include('include/footer.php');
?>