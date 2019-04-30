<?php
include('dbh.php');
include('include/header.php');



?>
<div class="container">
	&nbsp;&nbsp;
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<h4>Withdraw Details.</h4>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<table border="2">
				<thead>
					<tr>
							<th>Serial</th>
							<th>Date</th>
							<th>Member_id</th>
							<th>Member_name</th>
							<th>Withdraw-amount</th>
							<th>Withdraw_total</th>
						</tr>
				</thead>
				<tbody>
					<?php
						$id = $_GET['id'];
						$sql ="SELECT * FROM user_withdraw WHERE member_id = '$id'";
						$query = mysqli_query($conn,$sql);
						$result = mysqli_num_rows($query);
						
						$i= 1;
						if($result > 0){
							While($data = mysqli_fetch_assoc($query)){
				?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $data['date']; ?></td>
						<td><?php echo $data['member_id']; ?></td>
						<td><?php echo $data['member_name']; ?></td>
						<td><?php echo $data['withdraw_amount']; ?></td>
						<td><?php echo $data['withdraw_total']; ?></td>
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
	include("include/footer.php");
?>