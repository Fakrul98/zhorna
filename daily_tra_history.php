<?php
include('dbh.php');
?>

<div class="container sea_fild">
	
		<form action="daily_tra_history.php" method="post">
			<div class="row">
				<div class="col-sm-6 form-group">
					<input class="form-control" type="text" name="search"  placeholder="search" />
				</div>
				<button type="submit" value="submit" name="submit-search" class="btn btn-default">Submit
			</div>
		</form>
</div>
<div class="container">
	<table border="2" width="100%">
		<thead>
			<tr>
				
				<td>Date</td>
				<td >MemberId</td>
				<td>MemberName</td>
				<td>PerInstalment</td>
				<td>LoanAmount</td>
				<td>DepositAmount</td>
				<td>Withdraw</td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody>
<?php

	if(isset($_POST['submit-search'])){
		$txt = $_POST['search'];
		
		$sql = "SELECT i.date,i.member_id,i.member_name,i.per_inst,l.amount,d.dep_amount,w.withdraw_amount FROM 
	 instalment AS i 
	 left JOIN loan AS l ON i.member_id = l.member_id 
	 left JOIN user_deposit AS d ON i.member_id = d.member_id 
	 left JOIN user_withdraw AS w ON i.member_id = w.member_id
	WHERE i.date = '$txt' || l.date = '$txt' || d.date = '$txt' || w.date = '$txt' ORDER BY i.date DESC, l.date DESC, d.date DESC, w.date DESC ;";
		
	}
	$sql = "SELECT i.date,i.member_id,i.member_name,i.per_inst,l.amount,d.dep_amount,w.withdraw_amount FROM 
	 instalment AS i 
	 left JOIN loan AS l ON i.member_id = l.member_id 
	 left JOIN user_deposit AS d ON i.member_id = d.member_id 
	 left JOIN user_withdraw AS w ON i.member_id = w.member_id
	 ORDER BY i.date DESC;";
	 
	 $query = mysqli_query($conn,$sql);
	 $result = mysqli_num_rows($query);
	 
	 if($result > 0){
		 While($row = mysqli_fetch_assoc($query)){
?>

				<tr>
					<td><?php echo $row['date']?></td>
					<td><?php echo $row['member_id']?></td>
					<td><?php echo $row['member_name']?></td>
					<td><?php echo $row['per_inst']?></td>
					<td><?php echo $row['amount']?></td>
					<td><?php echo $row['dep_amount']?></td>
					<td><?php echo $row['withdraw_amount']?></td>
				</tr>

		<?php
			
				}
				}
				
			?>
		</tbody>
	</table>
</div>