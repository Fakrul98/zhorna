<?php
include('include/header.php');

?>	
<div class="container" style="padding-top:20px;">
	
		
			<form action="loanView.php" method="post">
			<div class="row">
				<div class="col-sm-6 form-group">
					<input class="form-control" type="text" name="search"  placeholder="search" />
				</div>
				<button type="submit" value="submit" name="submit-search" class="btn btn-default">Submit
			</div>
		</form>
		
		
	
</div>

<div class="container" id="loan_print">
	<h4>Member Lone List.</h4>
	<div class="row">
		<div class="col-md-8">
			<table border="2">
				<thead>
					<tr>
						<th>#sl</th>
						<th>Loan date</th>
						<th>Member Id</th>
						<th>Member Name</th>
						<th>Amount</th>
						<th>Refarance Id</th>
						<th>N id</th>
					</tr>
				</thead>
				<tbody>
<?php

		if(isset($_POST['submit-search'])){
			$txt = $_POST['search'];
			
			$sql = "SELECT * FROM loan WHERE member_id = '$txt' OR date = '$txt' OR member_name LIKE '%$txt%'; ";
			
		}
		else{
			$sql ="SELECT * FROM loan";
		}
		$query =mysqli_query($conn,$sql);
		
		$result = mysqli_num_rows($query);
		
				$i = 1;
				if($result > 0 ){
					while($data = mysqli_fetch_assoc($query)){
?>
				<tr><td><?php echo $i;?></td>
				<td><?php echo$data['date']; ?></td>
				<td><?php echo$data['member_id']; ?></td>
				<td><?php echo$data['member_name'] ;?></td>
				<td><?php echo$data['amount'] ;?></td>
				<td><?php echo$data['ref_member_id']; ?></td>
				<td><?php echo$data['national_id']; ?></td>

<?php	
				$i++;
					}
					
				}

?>				
				
				</tbody>
			</table>
		</div>
	 </div>
<button onclick="printContent('loan_print')">Print content</button>

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
	include("include/footer.php");
?>