<?php
	session_start();
	include('dbh.php');
	
	
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywores" content="zhorn, financial, account" />
		<meta name="description" content="This is zhorn web .We build our deram togeather." />
		<meta name="author" content="Fakrul hasan" />
		<title>This is zhorna web.We are togather for build our dream.</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
		<link href="css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="css/custom.css" type="text/css"/>
		<script src="js/jquery-1.11.3.min.js"></script>
		
		
	</head>
	<body>
			 <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Logo and responsive toggle -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                	<span class="glyphicon glyphicon-fire"></span> 
                	Logo
                </a>
            </div>
			
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
					<?php 
					
					if(@$_SESSION['usertype']=='Super Admin')
					{
					?>
				
 					<li><a href="user_reg.php">user registration</a></li>
					<li> <a href="member_list.php">Member List</a></li>
					<li><a href="instalment.php">Instalment</a></li>
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Deposit <span class="caret"></span></a>
						
						<ul class="dropdown-menu" aria-labelledby="about-us">
							<li><a href="daily_tra_history.php">Dailyhistory</a></li>
							<li><a href="deposit.php">Deposit</a></li>
						</ul>
					</li>
					
					<li><a href="withdraw.php">Withdraw</a></li>
					<li><a href="loan.php">loan</a></li>
					<li class="dropdown">
						<a href="user_view_f_update.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User UP/De <span class="caret"></span></a>
						<ul class="dropdown-menu" aria-labelledby="about-us">
							<li><a href="user_view_f_update.php">Update user</a></li>
							<li><a href="delete_user.php">Delete</a></li>
							<li><a href="deposit_delete.php">Deposit Delete</a></li>
							
						</ul>
					</li>
					<?php } elseif(@$_SESSION['usertype']=='Admin') 
					{?>
					<li><a href="user_reg.php">user registration</a></li>
					<li> <a href="member_list.php">Member List</a></li>
					<li><a href="instalment.php">Instalment</a></li>
					<li><a href="withdraw.php">Withdraw</a></li>
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Deposit <span class="caret"></span></a>
						
						<ul class="dropdown-menu" aria-labelledby="about-us">
							<li><a href="daily_tra_history.php">Dailyhistory</a></li>
							<li><a href="deposit.php">Deposit</a></li>
							
						</ul>
					</li>
					<?php } ?>
                </ul>	

				<!-- Search -->
				<div class= "nav navbar-nav navbar-right">
					<li ><a href="login.php">Login</a></li>
                    <li><a href="process/logout_submit.php">Logout</a></li>
				</div>
	
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
