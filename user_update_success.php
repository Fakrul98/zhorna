<?php
	session_start();
	$_SESSION['POST'] = $_POST;
	include('dbh.php');
	
	if(isset($_POST['submit'])){
			$final_up_id = $_POST['update_id'];
		
			if(isset($_FILES) & $_FILES['photo']['name']!=''){
				
			$file_name = $_FILES['photo']['name'];
			
			$file_size = $_FILES['photo']['size'];
			
			$file_ext = explode('.',$file_name);
			
			$file_axu_ext = array_pop($file_ext );
			
			$file_allowed = ['jpg','png','jpeg','gif'];
			
			$new_file_name = time().'_'.rand(10000,100000).'_'.$file_name;
			
			if($file_size > 500000 ){
				$_SESSION['err_msg'] = "Invalide file size(ex :450 kb)";
				header ("Location: user_view_f_update.php?id=".$id);
				exit();
			}
			
			if(!in_array($file_axu_ext,$file_allowed)){
				$_SESSION['err_msg'] = "Invalide file size(ex :450 kb)";
				header ("Location: user_view_f_update.php?id=".$id);
				exit();
			}
			move_uploaded_file($_FILES['photo']['tmp_name'],"images/profile_pic/".$new_file_name);
			$sql = "UPDATE user_reg SET photo ='$new_file_name' WHERE member_id = '$final_up_id'";
			 $quer = mysqli_query($conn,$sql);
		
		}
		
		
				$mem_id 	= $_POST['member_id'];
				$mem_name 	= $_POST['member_name'];
				$fa_name  	= $_POST['fa_name'];
				$mo_name	= $_POST['mo_name'];
				$address	= $_POST['address'];
				$email		= $_POST['email'];
				$mobile		= $_POST['phone_num'];
				$da_birth	= $_POST['da_birth'];
				$nid		= $_POST['n_id'];
				$gender		= $_POST['sex'];
				$area		= $_POST['area'];
				$digit		= substr($mobile,0,3);
				$number_code= ['015', '016', '017', '018', '019'];
				$gender_array=["male","female"];
				
				
			#member id cannot null.
			if($mem_id ===''){
				$_SESSION['err_msg'] = 'Member ID is required.';
				
				header ("Location: user_view_f_update.php?id=".$id);
				
				exit();
			}
			#If member id cannot duble;
				/*$sql_mem_id = "UPDATE user_reg SET member_id ='$mem_id'  WHERE id = '$id'";
				
				$query_mem_id = mysqli_query($conn,$sql_mem_id);

					header ("Location: user_view_f_update.php?id=".$id);
					
					exit(); */ #-------mem id.
			
			#If member name cannot duble or empty.;
			if($mem_name===''){
				$_SESSION['err_msg'] = 'Member name is required.';
				
				header ("Location: user_view_f_update.php?id=".$id);
				
				exit();
			}
			
			$sql_mem_name = "SELECT member_name FROM user_reg  LIMIT 1 WHERE id = '$id'";
			
			$query_mem_name = mysqli_query($conn,$sql_mem_name);
			
			$query_mem_name_check = mysqli_num_rows($query_mem_name);
			
			if($query_mem_name_check > 0){
				$_SESSION['err_msg'] = "Member name already exist.";
				
				header ("Location: user_view_f_update.php?id=".$id);
				
				exit();  #-----end--mem name.
			}
			
			#for email validation and checked Limit 1 .
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				$_SESSION['err_msg'] = 'Please Enter a valide email';
				
				header ("Location: user_view_f_update.php?id=".$id);
				exit();
			}
			
			$sql_email = "SELECT email FROM user_reg  LIMIT 1 WHERE id= '$id'";
			$query_email = mysqli_query($conn,$sql_email);
			$query_email_result = mysqli_num_rows($query_email);
			
			if($query_email_result > 0){
				$_SESSION['err_msg'] = "This email is already taken";
				header ("Location: user_view_f_update.php?id=".$id);
				
				exit();
			}# ---END Of EMAIL validation -----
			
			#mobile validation---
			if((strlen($mobile)!=11) || (!in_array($digit,$number_code))){
				$_SESSION['err_msg'] = "Invalide Mobile(Ex.017XXXXXXXX)";
				header ("Location: user_view_f_update.php?id=".$id);
				exit();
			}
			/*$sql_mobile = "SELECT *  FROM user_reg WHERE  phone_num = '$mobile' LIMIT 1  ";
			$query_mobile = mysqli_query($conn,$sql_mobile);
			$queryResult = mysqli_num_rows($query_mobile);
			if($queryResult > 0 ){
				$_SESSION ['err_msg'] = "You already use This Mobile number.";
				header ("Location: user_view_f_update.php?id=".$id);
				exit();
			}*/
			# end ----Mobile validation---
			
			if((strlen($nid) != 13) && strlen($nid) !=17){
				$_SESSION['err_msg'] = "Invalide Nid ,Please Enter 13 or 17 digit.";
				header ("Location: user_view_f_update.php?id=".$id);
				exit();
			}
			
			if(!(in_array($gender,$gender_array))){
				$_SESSION['err_msg'] = "Invalide gender value.";
				header ("Location: user_view_f_update.php?id=".$id);
				exit();
			}
			#---End of gender validaiton.
			
			$sql = "UPDATE user_reg 
			SET member_id ='$mem_id',
			member_name = '$mem_name',
			email = '$email', 
			phone_num = '$mobile', 
			fa_name = '$fa_name', 
			mo_name = '$mo_name', 
			address = '$address', 
			da_birth= '$da_birth',
			n_id = '$nid',
			sex = '$gender',
			area = '$area' WHERE member_id = '$final_up_id'";
			
			mysqli_query($conn,$sql);
	
			$_SESSION['err_msg'] = "Successfully UPdate data";
			
			header ("Location: user_view_f_update.php?id=".$id);
			
}else
			{
			$_SESSION['err_msg'] = 'Profile photo is required.';
			header ("Location: user_view_f_update.php?id=".$id);
			}
		
?>	
 
