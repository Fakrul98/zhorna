<?php
	include('include/header.php');
	include('dbh.php');

?>


<div class="container " >
	<div class="row">
	<div class="col-md-8">
		<h1> Please Submit Withdraw hear.</h1>
		<div ><?php if(isset($_SESSION['dep'])) echo $_SESSION['dep'];?></div>
		<form action="process/withdraw_submit_success.php" method="post" >
					
						
						
						<div class="form-group">
							<label>Date</label>
							<input type="date" name="with_date" id="" value=""  class="form-control">
						</div>
						
						<div class="form-group">
							<label>Member Id</label>
							<input type="text" name="member_id" id="memberId" value="" placeholder="Enter Member Id Here.." class="form-control">
						</div>
						
						
						<div class="form-group">
								<label>Member Name</label>
								<input type="text" name="member_name" id="memberName" placeholder="Enter First Name Here.." class="form-control"/>
						</div>
						
						<div class="form-group">
								<label>Your Current Balance</label>
								<input type="text" name="balance" id="balance" value="" class="form-control" readonly/>
						</div>
						
						<div class="form-group">
							<label>Withdraw request Amount</label>
							<input type="number"  name="amount" value="" placeholder="Enter Lone Amount hear.." id="amount"  class="form-control input"/>
							
						</div>
						
						<div class="form-group">
							<label>Rest Amount</label>
							<input type="number"   name="rest_amount" id="rest_amount" value=""  class="form-control input" readonly/>
							
						</div>

						<div class="form-group ">
							<label>Zone</label>
							<input type="radio" name="area" value="mir-bazar"/>Mirer bazar
							<input type="radio" name="area" value="mazu-khan" />Mazu khan
						</div>
						
						<div class="form-group ">
							<label>status</label>
							<select name="status">
								<option value="1">Active</option>
								<option value="0">Inactive</option>
							</select>
						</div>
						<div><input type="hidden" name="id" /></div>
			<button type="submit" value="submit" name="submit" class="btn btn-lg btn-info">Submit</button>
			<a  class="btn btn-lg btn-info" href="withdraw_view.php"> withdraw_view</a>
	
					
	</form>
</div>	
</div>	
</div>
<div > &nbsp &nbsp </div>
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
						$("#rest_amount").val("");
						$("#memberName").val(data.name);
						$("#balance").val(data.balance);
						$("#rest_amount").val(data.balance);
						
					}
				});
			
			});
			
			$("#amount").keyup(function (){
				
				var balance = $("#balance").val();
				var amount = $(this).val();
				var rest_amount = balance - amount;
				$("#rest_amount").val(rest_amount);
				
			});
			
		});
	</script>
<?php
	include("include/footer.php");
	unset($_SESSION['dep']);
	
	
?>