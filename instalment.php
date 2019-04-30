<?php
	include('dbh.php');
	include('include/header.php');
	
	$sql = "SELECT * FROM instalment";
	$query = mysqli_query($conn,$sql);
	$data = mysqli_fetch_assoc($query);
	
	

?>

<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			
		</div>
	</div>
 </div>
 
<div class="container" style="margin-top:30px;">

<h1> Please Submit Instalment Here.</h1>
	
	<div class="row">
		<div class="col-md-8">
	
	<div >
		<?php if (isset($_SESSION['succ_msg'])) echo $_SESSION['succ_msg'];?>
	</div>
			<form action="process/instalment_submit_success.php" method="post" >			
				<div class="form-group" >
					<label>Instalment Date</label>
					<input type="date" name="ins_date" value=" " class="form-control"/>
				</div>
				<div class="form-group">
					<label>Member Id</label>
					<input type="text" name="member_id" id="memberId" value="" class="form-control">
				</div>
				
				<div class="form-group">
					<label>Member name</label>
					<input type="text" name="member_name" id="memberName" value="" class="form-control">
				</div>

				<div class="form-group">
					<label>Per Instalment</label>
					<input type="number" name="perIns" id="perIns" value="" class="form-control"/>
				</div>			
				<div class="form-group ">
					<label>Zone</label>
					<input type="radio" name="area" value="mir-bazar"/>Mirer bazar
					<input type="radio" name="area" value="mazu-khan" />Mazu khan
				</div>
				<button type="submit" value="submit" name="submit" class="btn  btn-info">Submit</button>			
				<a href="installment_view.php" class="btn btn-info">Inst-View</a>
				<a href="loanView.php" class="btn btn-info">Loan-View</a>	
			</form>
		</div>
	</div>
</div>
<div>&nbsp;&nbsp;</div>
<script>
		$(document).ready(function(){
			$("#memberId").keyup(function(){
				var member_id = $(this).val();
				var data ="member_id="+member_id;
				$.ajax({
					url:"ajax/getloan.php",
					type:'POST',
					data:data,
					success:function(response){
						var data = JSON.parse(response);
						$("#memberName").val(data.name);
						
					}
				});
			
			});
			
		});
	</script>
<?php
	include("include/footer.php");
	unset($_SESSION['succ_msg']);
	
?>