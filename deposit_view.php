<?php
include('dbh.php');
include('include/header.php');
if(!isset($_SESSION['usertype'])){
	header("Location:login.php");
	exit();
}
?>
<div>&nbsp;&nbsp;</div>
<div class="container sea_fild">
	
		<form action="deposit_view.php" method="post">
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
			<h3>Member Deposit </h3>
			<table border="2" width=100%>
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
								<a href="deposit_view_detail.php?id=<?php echo $row['member_id'];?>">Detail</a> 
								
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
<div class="container">
	<div> <button onclick="printContent('deposit_print')">Print content</button> </div>
</div>
<div>&nbsp;&nbsp;</div>	
<script>
	function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
<?php
	include("include/footer.php");
?>