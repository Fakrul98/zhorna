<?php
include('dbh.php');
include('include/header.php');
if(!isset($_SESSION['usertype'])){
	header("Location:login.php");
	exit();
}
?>

<div class="container sea_fild">
	
		<form action="deposit_delete.php" method="post">
			<div class="row">
				<div class="col-sm-6 form-group">
					<input class="form-control" type="text" name="search"  placeholder="search" />
				</div>
				<button type="submit" value="submit" name="submit-search" class="btn btn-default">Submit
			</div>
		</form>
</div>
<div class="container" id="deposit_print">
	<div class="row">
		<div class="col-md-6">
		<?php if(isset($_SESSION['msg'])) echo $_SESSION['msg'];?>
			<h3>Member Deposit view For Delete</h3>
			<table border="2" width="100%">
				<thead>
					<tr>
						<td>SL</td>
						<td>Date</td>
						<td class="dep-td"><span class="dep-spa">MemberId</span></td>
						<td>MemberName</td>
						<td>DepositAmount</td>
						<td>Action</td>
					</tr>
				</thead>
				<tbody>
					<?php
					
						if(isset($_POST['submit-search'])){
							$txt = $_POST['search'];
							
							$sql = "SELECT * FROM  user_deposit WHERE  	member_id = '$txt' OR date = '$txt' OR member_name LIKE '%$txt%' ;";
						}
						else{
							$sql = "SELECT * FROM user_deposit;";
							}
						$result = mysqli_query($conn,$sql);
						
						$resultCheck = mysqli_num_rows($result);
						
						$i= 1;
						
						if($resultCheck > 0){
							while($row = mysqli_fetch_assoc($result)){
								
						
						?>

						<tr>
							<td><?php echo $i;?></td>
							<td><?php echo $row['date'];?></td>
							<td><span class="dep-spa"><?php echo $row['member_id'];?></span></td>
							<td><?php echo $row['member_name'];?></td>
							<td><span class="dep-spa"><?php echo $row['dep_amount'];?></span></td>
							<td>
						<a href="deposit_delete_success.php?id=<?php echo $row['deposit_id'];?>" onclick="return confirm('Are you sure you want to delete this data.!');"  >Delete</a> 
								
							</td>
							
							
						</tr>
						
					<?php
					$i++;
						}
						}
						
					?>
				</tbody>
			</table>
			
		</div>
	</div>
</div>
<div>&nbsp;&nbsp;</div>
<?php
	unset($_SESSION['msg']);
	include("include/footer.php");
?>