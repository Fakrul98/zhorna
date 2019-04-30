<?php
	include('include/header.php');
	$id = $_GET['id'];
?>
<div class="container" style="margin-top:31px;padding-top:31px;">
	<h3 align="center">Instalment History.</h3>
		<div class="row">
			<div class="col-md-12">
				<table border="1" width ="100%">
					<thead>
						<tr>
							<th>Ins_id</th>
							<th>Inst_date</th> 	
							<th>Member_id </th>
							<th>Member_name </th>
							<th>Per_instalment </th>
							<th>Due_instalment </th>
							<th>Action</th>
						</tr>
					</thead>
				<tbody>
				
				<?php
				
					$sql = "SELECT * FROM instalment WHERE member_id = '$id'";
					$query = mysqli_query($conn,$sql);
					$queryResult = mysqli_num_rows($query);
					
					if($queryResult > 0 ){
						while($data = mysqli_fetch_assoc($query)){
					
				?>
				
					<tr>
						<td><?php echo $data ['ins_id'];?></td>
						<td><?php echo $data['date'];?></td>
						<td><?php echo $data['member_id'];?></td>
						<td><?php echo $data['member_name'];?></td>
						<td><?php echo $data['per_inst'];?></td>
						<td><?php echo $data['due_inst'];?></td>
						<td><a href ="deatail_instalment.php?id=<?php echo $data['member_id'];?>">detail</a></td>
					</tr>
				
				<?php
					
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