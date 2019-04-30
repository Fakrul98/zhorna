<?php
include("dbh.php");
include("include/header.php");

?>
	<div class="container">
		<div class="jumbotron feture">
			<div class="row">
				<div class="col-sm-12">
						<img src="images/1.png" class="img-responsive" />
				</div>
			</div>
		</div>
	</div>
<div class= "container">
	<div class="row">
	<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="card mx-auto" style="">
		<div class="card-body">
				<h3 class="text-center txt-dark mb-10">Sign in to Admin</h3>
				<h6 class="text-center nonecase-font txt-grey">Enter your details below</h6>
				<?php if(isset($_SESSION['msg'])) echo $_SESSION['msg']; ?>
				
				<form action="process/login_submit_success.php" method="post">
							<div class="form-group">
								<label class="control-label mb-10" for="exampleInputEmail_2">Email address</label>
								<input type="email" class="form-control" required="" id="exampleInputEmail_2" placeholder="Enter email" name="email">
							</div>
							<div class="form-group">
								<label class="pull-left control-label mb-10" for="exampleInputpwd_2">Password</label>
								
								<div class="clearfix"></div>
								<input type="password" class="form-control" required="" id="exampleInputpwd_2" placeholder="Enter pwd" name="password">
							</div>
							
							
							<div class="form-group text-center">
								<button type="submit" class="btn btn-info btn-success btn-rounded">sign in</button>
							</div>
						</form>
		</div>
	</div>

	</div>
<div class="col-md-3"></div>
</div>	

</div>
<?php
	include("include/footer.php");
	unset($_SESSION['msg']);
?>