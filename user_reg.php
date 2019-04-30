<?php
	include('include/header.php');
	if(!isset($_SESSION['usertype'])){
	header("Location:login.php");
	exit();
}
?>

	<div class="container">
    <h1 class="well text-center"> Member Registration Form</h1>
	<div class="col-lg-8 well">
	<div class="row">
		<?php if(isset($_SESSION['err_msg'])) echo $_SESSION['err_msg'];?>
				<form action="user_reg_succ.php" method="post" enctype="multipart/form-data">
					<div class="col-sm-12 ">
						<div class="form-group">
							<label>Profile picture</label>
							<input type="file" name="photo"  />
							
						</div>
						
						<div class="form-group">
							<label>Date</label>
							<input type="date" name="date" value="<?php echo isset($_SESSION['POST']['date']) ? $_SESSION['POST'] ['date']: '';?>" class="form-control">
						</div>
						
						<div class="form-group">
							<label>Member Id</label>
							<input type="text" name="member_id" value="<?php echo isset($_SESSION['POST']['member_id']) ? $_SESSION['POST'] ['member_id']: '';?>"placeholder="Enter Member Id Here.." class="form-control">
						</div>
						
						<div class="row">
							<div class="col-sm-12 form-group">
								<label>Member Name</label>
								<input type="text" name="member_name" value="<?php echo isset($_SESSION['POST']['member_name']) ? $_SESSION['POST']['member_name'] : '';?>"placeholder="Enter First Name Here.." class="form-control"/>
							</div>
						</div>	
						<div class="form-group">
							<label>Father's Name</label>
							<input type="text"  value="<?php echo isset($_SESSION['POST']['fa_name']) ? $_SESSION['POST']['fa_name']:'';?>"placeholder="Enter Your Father's Name.."  name="fa_name"class="form-control input"/>
						</div>
						<div class="form-group">
							<label>Mother's Name</label>
							<input type="text"  name="mo_name"  value="<?php echo isset($_SESSION['POST']['mo_name']) ? $_SESSION['POST']['mo_name']:'';?>" placeholder="Enter Mother's Name .."   class="form-control input"/>
						</div>
						<div class="form-group">
							<label>Address</label>
							<textarea   placeholder="Enter Address Here.." rows="3" name="address" value="" class="form-control input"><?php echo isset($_SESSION['POST']['address']) ? $_SESSION ['POST']['address']:'';?></textarea>
						</div>	
						
						<div class="form-group">
						<label>Email </label>
						<input type="text" name="email" value="<?php echo isset($_SESSION['POST']['email']) ? $_SESSION['POST']['email']:'';?>" placeholder="Enter Email Address Here.." class="form-control">
					</div>
												
					<div class="form-group">
						<label>Phone Number</label>
						<input type="text"  name ="phone_num" value="<?php echo isset($_SESSION['POST']['phone_num']) ? $_SESSION['POST']['phone_num']:'';?>" placeholder="Enter Phone Number Here.." class="form-control">
					</div>		
						
					<div class="form-group" >
						<label>Date of birth</label>
						<input type="date" name="da_birth" value="<?php echo isset($_SESSION['POST']['da_birth']) ? $_SESSION['POST']['da_birth']:'';?>" class="form-control"/>
					</div>
					
					<div class="form-group">
							<label>National Id</label>
							<input type="number"  name ="n_id"  value="<?php echo isset($_SESSION['POST']['n_id']) ? $_SESSION['POST']['n_id']:'';?>" placeholder="Enter Nid Number Here.." class="form-control">
						</div>
		
						<div class="form-group ">
							<label>Gender</label>
							<input type="radio" name="sex" value="male"<?php if(isset($_SESSION['POST']['sex']) && $_SESSION['POST']['sex']=='male') echo 'checked';?> />Male
							<input type="radio" name="sex" value="female" <?php if(isset($_SESSION['POST']['sex']) && $_SESSION['POST']['sex']=='female') echo 'checked';?>  />Female
						</div>
						<div class="form-group ">
							<label>Zone</label>
							<input type="radio" name="area" value="mir-bazar"<?php if (isset($_SESSION['POST']['area']) && $_SESSION['POST']['area']=='mir-bazar') echo 'checked';?> />Mirer bazar
							<input type="radio" name="area" value="mazu-khan"<?php if (isset($_SESSION['POST']['area']) && $_SESSION['POST']['area']=='mazu-khan') echo 'checked';?>/>Mazu khan
						</div>
						
					<button type="submit" value="submit" name="submit" class="btn btn-lg btn-info">Submit</button>					
					</div>
					
				</form> 
				</div>
	</div>
	<div class="col-lg-4  well" >
		<div class="row">
			<div class="col-sm-12 text-center for-text">
				<h4>Terms and Conditions</h4><br />
				<h6>Please read carefully.</h6>
			<p >Common side effects include weakness, sleepiness, low blood pressure, and a decreased effort to breathe. [2] When given intravenously the person should be closely monitored. [2] Among those who are depressed there may be an increased risk of suicide. [2][7] With long-term use larger doses may be required for the same effect. [2] Physical dependence and psychological dependence may also occur. [2] If stopped suddenly after long-term use, benzodiazepine withdrawal syndrome may occur. [2] Older people more often develop adverse effects. [8] In this age group lorazepam is associated with falls and hip fractures. [9] Due to these concerns, lorazepam use is generally only recommended for up to two to four weeks.[10] Lorazepam was initially patented in 1963 and went on sale in the United States in 1977.[11] It is on the World Health Organization's List of Essential Medicines, the most effective and safe medicines needed in a health system.[12] It is available as a generic medication.[2] The wholesale cost in the developing world of a typical dose by mouth is between US$0.02 and US$0.16 as of 2014.[13] In the United States as of 2015 a typical month supply is less than US$25.[14] In the United States in 2011, 28 million prescriptions for lorazepam were filled making it the second most prescribed benzodiazepine after alprazolam.[15] Common side effects include weakness, sleepiness, low blood pressure, and a decreased effort to breathe. [2] When given intravenously the person should be closely monitored. [2] Among those who are depressed there may be an increased risk of suicide. [2][7] With long-term use larger doses may be required for the same effect. [2] Physical dependence and psychological dependence may also occur. [2] If stopped suddenly after long-term use.
			</p></div>

		</div>
	</div>
	</div>



<?php
	
	include('include/footer.php');
	unset($_SESSION['err_msg']);
	unset($_SESSION['POST']);
?>