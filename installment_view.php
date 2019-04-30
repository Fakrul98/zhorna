<?php
	include('include/header.php');
?>
<div class="container" style="margin-top:31px;padding-top:31px;">
	
	
	<div class="container">
		<form action="installment_view.php" method="post">
			<div class="row">
				<div class="col-sm-6 form-group">
					<input class="form-control" type="text" name="search"  placeholder="search" />
					
				</div>
				<div class="col-sm-6 form-group">
					<button type="submit" value="submit" name="submit-search" class="btn btn-default">Submit
				</div>
			</div>
		</form>
	</div>
		
<div class="container" id="print_this">
	<div class="row">
		<div class="col-sm-8">
			<h3 align="center">Instalment History.</h3>
		</div>
	</div>
	
 <div class="row">
	<div class="col-md-8 col-sm-12">
	<table border="1" width ="100%">
		<thead>
			<tr>
				<th>Inst_date</th> 	 	 			
				<th>Member_name </th>
				<th>Member_id </th>
				<th>Instelment Amount </th>
				<th>Due Amount </th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		
		<?php
		if(isset($_POST['submit-search'])){
			$txt = $_POST['search'];
			
			$sql = "SELECT * FROM instalment WHERE date = '$txt' OR member_id = '$txt' OR member_name LIKE 
			'%$txt%'";
		}else{
			$sql = "SELECT * FROM instalment";
			
		}
			
			$query = mysqli_query($conn,$sql);
			$queryResult = mysqli_num_rows($query);
			
			if($queryResult > 0 ){
				while($data = mysqli_fetch_assoc($query)){
			
		?>
		
			<tr>
				<td><?php echo $data['date'];?></td>
				<td><?php echo $data['member_name'];?></td>
				<td><?php echo $data['member_id'];?></td>
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
	<button onclick="printContent('print_this')">Print Content</button>
</div>
</div>
</div>
</div>
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
	include('include/footer.php')
?>