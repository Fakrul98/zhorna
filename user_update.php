<?php
include('include/header.php');

$id = base64_decode($_GET['id']);
$sql = "SELECT * FROM user_reg WHERE member_id = '$id'";
$query = mysqli_query($conn,$sql);

$data = mysqli_fetch_assoc($query);


?>

<div class="container">
    <h1 class="well text-center"> User Update Form</h1>
	<div class="col-lg-8 well">
	<div class="row">
		<?php if(isset($_SESSION['err_msg'])) echo $_SESSION['err_msg'];?>
				<form action="user_update_success.php" method="post" enctype="multipart/form-data">
					<div class="col-sm-12 ">
						<div class="form-group">
							<label>Profile picture</label>
							<input type="file" name="photo"  />
							<div><img src="images/profile_pic/<?php echo $data['photo'];?>" /></div>
						</div>
						<div class="form-group">
							<label>Member Id</label>
							<input type="text" name="member_id" value="<?php echo $data['member_id'];?>"placeholder="Enter Member Id Here.." class="form-control">
						</div>
						
						<div class="row">
							<div class="col-sm-12 form-group">
								<label>Member Name</label>
								<input type="text" name="member_name" value="<?php echo $data['member_name'];?>"placeholder="Enter First Name Here.." class="form-control"/>
							</div>
						</div>	
						<div class="form-group">
							<label>Father's Name</label>
							<input type="text"  value="<?php echo $data['fa_name'];?>"placeholder="Enter Your Father's Name.."  name="fa_name"class="form-control input"/>
						</div>
						<div class="form-group">
							<label>Mother's Name</label>
							<input type="text"  name="mo_name"  value="<?php echo $data['mo_name'];?>" placeholder="Enter Mother's Name .."   class="form-control input"/>
						</div>
						<div class="form-group">
							<label>Address</label>
							<textarea  value="" placeholder="Enter Address Here.." rows="3" name="address" class="form-control input"><?php echo $data['address'];?></textarea>
						</div>	
						
						<div class="form-group">
						<label>Email </label>
						<input type="text" name="email" value="<?php echo $data['email'];?>" placeholder="Enter Email Address Here.." class="form-control">
					</div>
												
					<div class="form-group">
						<label>Phone Number</label>
						<input type="text"  name ="phone_num" value="<?php echo $data['phone_num'];?>" placeholder="Enter Phone Number Here.." class="form-control">
					</div>		
						
					<div class="form-group" >
						<label>Date of birth</label>
						<input type="date" name="da_birth" value="<?php echo $data['da_birth'];?>" class="form-control"/>
					</div>
					
					<div class="form-group">
							<label>National Id</label>
							<input type="number"  name ="n_id"  value="<?php echo $data['n_id'];?>" placeholder="Enter Nid Number Here.." class="form-control">
						</div>
		
						<div class="form-group ">
							<label>Gender</label>
							<input type="radio" name="sex" value="male"<?php if($data['sex']=='male') echo 'checked';?> />Male
							<input type="radio" name="sex" value="female" <?php if($data['sex']== 'female') echo 'checked';?>  />Female
						</div>
						<div class="form-group ">
							<label>Zone</label>
							<input type="radio" name="area" value="mir-bazar"<?php if ($data['area']== 'mir-bazar') echo 'checked';?> />Mirer bazar
							<input type="radio" name="area" value="mazu-khan"<?php if ($data['area']=='mazu-khan')echo 'checked';?>/>Mazu khan
						</div>
						<div class="from-group">
							<input type="hidden" name="update_id" value="<?php echo $data['member_id'];?>"/>
						</div>
					<button type="submit" value="submit" name="submit" class="btn btn-lg btn-info">Submit</button>					
					</div>
					
				</form> 
				</div>
	</div>
	<div class="col-lg-4  well" >
		<div class="row">
			<div class="col-sm-12 text-center for-text">
				<h4>Image</h4><br />
				<h6>our</h6>
			<p ><img src="images/1.jpg"/>
			<p ><img src="images/1.jpg"/>
			<p ><img src="images/1.jpg"/>
			<p ><img src="images/1.jpg"/>
			<p ><img src="images/1.jpg"/>
			</p></div>

		</div>
	</div>
	</div>
<?php
	unset($_SESSION['err_msg']);
?>