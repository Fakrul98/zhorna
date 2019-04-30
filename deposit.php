<?php
	include('include/header.php');
if(!isset($_SESSION['usertype'])){
	header("Location:login.php");
	exit();
}

?>


<div class="container " style="margin-top:30px;">
	<div class="row">
	<div class="col-md-8">
	<h1> Please Submit Deposit hear.</h1>
	<div ><?php if(isset($_SESSION['dep'])) echo $_SESSION['dep'];?></div>
	<form action="process/deposit_submit_success.php" method="post" >
					
						
						
						<div class="form-group">
							<label>Date</label>
							<input type="date" name="dep_date" id="" value=""  class="form-control">
						</div>
						<div class="form-group">
							<label>Member Id</label>
							<input type="text" name="member_id" id="memberId" value="" placeholder="Enter Member Id Here.." class="form-control">
						</div>
						
						
							<div class="form-group">
								<label>Member Name</label>
								<input type="text" name="member_name" id="memberName" value="<?php echo isset($_SESSION['POST']['member_name']) ?  $_SESSION['POST']['member_name']:'';?>" placeholder="Enter First Name Here.." class="form-control"/>
							</div>
						
						<div class="form-group">
							<label>Amount</label>
							<input type="number"  name="amount" value="" placeholder="Enter Lone Amount hear.."  class="form-control input"/>
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
			<button type="submit" value="submit" name="submit" class="btn  btn-info">Submit</button>
			<a  class="btn  btn-info" href="deposit_view.php">View</a>					
	
					
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
	unset($_SESSION['dep']);
	unset($_SESSION['POST']);
	
?>