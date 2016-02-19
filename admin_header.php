<?php 

	require 'models/db_connect.php';

	$socials = get_socials();

 ?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       	<title>IELTS Preparation | التحضير للآيلتس</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/jquery.datetimepicker.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

		<!-- Top menu -->
		<nav class="navbar navbar-inverse navbar-fixed-top navbar-no-bg" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href=".">Intlacademic</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-right">
						<!-- <li>
							<span class="li-social">
                                <a href="archived.php"><i class="fa fa-archive"></i> Archive</a>
								<a href="logout.php"><i class="fa fa-sign-out"></i>Sign Out</a>
							</span>
                        </li> -->
                        <li><a href="current_subscribers.php"><i class="fa fa-users"></i> Current Subscribers &nbsp;</a></li>
                        <li><a href="archives.php"><i class="fa fa-archive"></i> Archives &nbsp;</a></li>


                        <li class="dropdown">
			              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog"></i> Settings &nbsp; <span class="caret"></span></a>
			              <ul class="dropdown-menu">
			                <li><a href="settings.php">Workshop Info</a></li>
			                <li><a  href="#socialModal" data-toggle="modal">Social Media</a></li>
			                <li><a href="workshops_settings.php">Workshops</a></li>
			                <li><a href="ads_settings.php">Ads. Control Panel</a></li>

			              </ul>
			            </li>

                        <li class="dropdown">
			              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>  Welcome, <?php echo $_SESSION['admin'] ?> &nbsp; <span class="caret"></span></a>
			              <ul class="dropdown-menu">
			                <li><a href="logout.php">&nbsp;&nbsp;<i class="fa fa-sign-out"></i> Sign Out &nbsp;</a></li>
			              </ul>
			            </li>

						
                        
					</ul>
				</div>
			</div>
		</nav>


		<!-- SOCIAL MEDIA MODAL -->
		<div class="modal fade" id="socialModal">
			<div class="modal-dialog">
				<div class="modal-content">
					
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel"><i class="fa fa-cog"></i> Edit Social Media Accounts</h4>
				</div>

				<div class="modal-body">
					
					<div class="form-bottom contact-form">
						<div id="status"></div>
						<form class="form-horizontal" role="form" id="socialMedia" action="social_update.php" method="POST">

							<div class="form-group">
								<label for="socialEmail" class="white-text">Email:</label>
								<input type="text" class="form-control" name="socialEmail" id="socialEmail" value="<?php echo $socials->email; ?>">
							</div>

							<div class="form-group">
								<label for="socialInstagram" class="white-text">Instagram:</label>
								<input type="text" class="form-control" name="socialInstagram" id="socialInstagram" value="<?php echo $socials->instagram; ?>">
							</div>

							<div class="form-group">
								<label for="socialFacebook" class="white-text">Facebook:</label>
								<input type="text" class="form-control" name="socialFacebook" id="socialFacebook" value="<?php echo $socials->facebook; ?>">
							</div>

							<div class="form-group">
								<label for="socialTwitter" class="white-text">Twitter:</label>
								<input type="text" class="form-control" name="socialTwitter" id="socialTwitter" value="<?php echo $socials->twitter; ?>">
							</div>

							<div class="form-group">
								<label for="socialSkype" class="white-text">Skype:</label>
								<input type="text" class="form-control" name="socialSkype" id="socialSkype"  value="<?php echo $socials->skype; ?>">
							</div>

							<div class="form-group">
								<label for="phone" class="white-text">Phone:</label>
								<input type="text" class="form-control" name="phone" id="phone" value="<?php echo $socials->phone; ?>">
							</div>

							<div class="form-group">
								<label for="mobile" class="white-text">Mobile:</label>
								<input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo $socials->mobile; ?>">
							</div>

							<input type="button" class="btn btn-danger" id="social_post" value="Update">

						</form>

					</div>
					
					

				</div>


				</div>
			</div>
		</div>



