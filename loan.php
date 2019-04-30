<?php
	include('include/header.php');
	include('dbh.php');
	if(!isset($_SESSION['usertype'])){
	header("Location:login.php");
	exit();
}
	
?>


<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<a href="loanView.php">ViewLoan</a>	
		</div>
	</div>
 </div>
 
<div class="container" style="margin-top:30px;">
	<div class="row">
		<div class="col-md-8">
<h1> Please Submit Loan hear.</h1>
	<div ><?php if (isset($_SESSION['succ_msg'])) echo $_SESSION['succ_msg'];?></div>
	<form action="process/loan_submit_success.php" method="post" >
					
						<div class="form-group">
							<label>photo</label>
							<input type="hidden" name="photo"  id="memberImage" value=" "/>
						</div>
						
					
						<div class="form-group">
							<label>Member Id</label>
							<input type="text" name="member_id" id="memberId" value="" placeholder="Enter Member Id Here.." class="form-control">
						</div>
						
						
							<div class="form-group">
								<label>Member Name</label>
								<input type="text" name="member_name" id="memberName" value="" placeholder="Enter First Name Here.." class="form-control"/>
							</div>
						
						<div class="form-group">
							<label>Amount</label>
							<input type="number"  name="amount" value="" placeholder="Enter Lone Amount hear.."  class="form-control input"/>
						</div>
								
						
					<div class="form-group" >
						<label>Loan Date</label>
						<input type="date" name="loan_date" value=" " class="form-control"/>
					</div>
					<div class="form-group">
							<label>Referance Member</label>
							<input type="number"  name ="ref_mem_id" placeholder="Enter Referance Id.." class="form-control">
						</div>
		
					<div class="form-group">
							<label>National Id</label>
							<input type="number"  name ="n_id" id="nId" placeholder="Enter Nid Number Here.." class="form-control">
						</div>
		
						<div class="form-group ">
							<label>Gender</label>
							<input type="radio" name="sex" value="male"  />Male
							<input type="radio" name="sex" value="female"  />Female
						</div>
						<div class="form-group ">
							<label>Zone</label>
							<input type="radio" name="area" value="mir-bazar"/>Mirer bazar
							<input type="radio" name="area" value="mazu-khan" />Mazu khan
						</div>
						
						<div class="form-group ">
							<label>status</label>
							<select name="status">
								<option value="Better">Better</option>
								<option value="Good">Good</option>
							</select>
						</div>
						<div><input type="hidden" name="id" /></div>
				<button type="submit" value="submit" name="submit" class="btn btn-lg btn-info">Submit</button>					
	
					
	</form>
	</div>
	</div>
</div>
<div>&nbsp;&nbsp</div>
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
						$("#memberImage").val(data.image);
						$("#memberName").val(data.name);
						$("#nId").val(data.n_id);
					}
				});
			
			});
			
		});
	</script>
<?php
	include("include/footer.php");
	unset($_SESSION['succ_msg']);
	
?>