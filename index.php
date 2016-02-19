<?php 

	require 'models/db_functions.php';
	require 'models/ad.php';

	$settings = get_settings();
	$workshops = get_workshops();
	$myAd = new Ad();
    $ads = $myAd->listActiveAds();
	

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

        <link rel='stylesheet' href='assets/css/tooltips.css'>

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
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
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
						<li>
							<span class="li-social">
								<i class="fa fa-phone fa-lg"> 013 562 0680</i> - 
                                <i class="fa fa-mobile fa-lg"> +966 544 699990</i>
								<a href="https://instagram.com/intlaca/"><i class="fa fa-instagram"></i></a>
								<a href="https://www.facebook.com/الاكاديمي-الدولي-منسقون-للدراسه-في-الخارج--165371360167502"><i class="fa fa-facebook"></i></a> 
								<a href="https://twitter.com/intlaca"><i class="fa fa-twitter"></i></a> 
								<a href="mailto:info@intlaca.com"><i class="fa fa-envelope"></i></a> 
								<a href="skype:intl.academic?call"><i class="fa fa-skype"></i></a>

							</span>
						</li>
						<li><a class="admin-login" href="admin.php">Admin Login</a></li>
					</ul>
				</div>
			</div>
		</nav>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text content-head">
                            <h1>نموذج التسجيل في ورشة <?php echo $settings->workshop_name_ar; ?></h1>
                            <h1>Registration Form For <?php echo $settings->workshop_name_en; ?> Workshop</h1>
                            <h2><i class="fa fa-calendar"></i></h2>
                            <h3>الموعد القادم لورشة (<?php echo $settings->workshop_name_ar; ?>) : 
                            	<?php echo $settings->next_workshop_date; ?>
                             - في تمام الساعة 
                             	<?php 
                             		echo $settings->next_workshop_time;
                             		if ($settings->am_pm == 'am') {
                             			echo ' صباحاً';
                             		} else {
                             			echo ' مساءاً';
                             		}
                             	?>
                            </h3>
                            <h3>Next (<?php echo $settings->workshop_name_en; ?>) workshop will be on: 
                            	<?php echo $settings->next_workshop_date; ?>
                                - At 
                             	<?php 
                             		echo $settings->next_workshop_time;
                             		if ($settings->am_pm == 'am') {
                             			echo ' AM';
                             		} else {
                             			echo ' PM';
                             		}
                             	?>
                             </h3>
                            <h3>موقع التدريب: <?php echo $settings->workshop_location_ar; ?></h3>
                            <h3>Training Location: <?php echo $settings->workshop_location_en; ?></h3>
                            <div class="description">
                            	<!-- <p>
	                            	This is a free responsive contact form made with Bootstrap. 
	                            	Download it on <a href="http://azmind.com"><strong>AZMIND</strong></a>, customize and use it as you like!
                            	</p> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">

                    	<div class="col-sm-5 form-box">
                    		<!-- <img src="assets/img/ads/intlaca_ad.jpg" alt="">
							
							<img src="assets/img/ads/masterclass_info.jpg" alt="" class="padding-ielts-link"> -->
							<?php foreach ($ads as $ad): ?>
								<img src="assets/img/ads/<?php echo $ad->file_name; ?>" alt="" class="padding-ielts-link">
							<?php endforeach; ?>

							<a href="http://www.intlaca.com/ilets/step_1.html">
								<img class="padding-ielts-link" src="assets/img/IDP_IELTS_LOGO.jpg" alt="">
							</a>

                    	</div>

						<div class="col-sm-1 middle-border"></div>
                        <div class="col-sm-1"></div>


                        <div class="col-sm-5 col-sm-offset-1 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Registration / التسجيل</h3>
                            		<p>قم بتعبئة كامل النموذج التالي لاتمام عملية التسجيل</p>
                            		<p>Fill out this application form to complete your registration</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-pencil"></i>
                        		</div>
                            </div>

                            <div class="form-bottom contact-form">

			                    <form role="form" action="process.php" method="post">

			                    	<div class="form-group">
			                    		<label class="sr-only" for="name">Name / الاسم</label>
			                        	<input type="text" name="name" placeholder="Name / الاسم ..." class="form-control" id="name">
			                        </div>

			                        <div class="form-group">
			                    		<label class="sr-only" for="dob">DOB / تاريخ الميلاد</label>
			                        	<input type="text" name="dob" placeholder="DOB / تاريخ الميلاد ..." class="form-control" id="dob">
			                        </div>

			                        <div class="form-group">
			                    		<label class="sr-only" for="mobile">Mobile Number/ رقم الجوال</label>
			                        	<input type="text" name="mobile" placeholder="Mobile Number/ رقم الجوال ..." class="form-control" id="mobile">
			                        </div>

			                        <div class="form-group">
			                        	<label class="sr-only" for="email">Email / البريد الالكتروني</label>
			                        	<input type="text" name="email" placeholder="Email / البريد الالكتروني ..." class="form-control" id="email">
			                        </div>

									<div class="form-group">
										<label  class="white-text" for="qualification">Academic Qualification / المؤهل العلمي</label>
									     <select id="qualification" name="qualification" placeholder="Academic Qualification / المؤهل العلمي ..." class="form-control">
										     <option value="High School / ثانوي">High School / ثانوي</option>
										     <option value="Bachelor Degree / بكالوريوس">Bachelor Degree / بكالوريوس</option>
										     <option value="Master Degree / ماجستير">Master Degree / ماجستير</option>
										     <option value="Doctorate Degree / دكتوراة">Doctorate Degree / دكتوراة</option>
									     </select>
			                        </div>
				
									<div class="form-group">
										<label  class="white-text" for="email">English Level / مستوى اللغة الانجليزية</label>
									     <select id="englishlevel" name="englishlevel" placeholder="Email / البريد الالكتروني ..." class="form-control">
										     <option value="Low / متدني">Low / متدني</option>
										     <option value="Good / جيد">Good / جيد</option>
										     <option value="Very Good / جيد جدا">Very Good / جيد جدا</option>
										     <option value="Excellent / ممتاز">Excellent / ممتاز</option>
									     </select>
			                        </div>


			                        <div class="form-group">
			                        	<label class="sr-only" for="work">Current Job / الوظيفة الحالية</label>
			                        	<input type="text" name="work" placeholder="Current Job / الوظيفة الحالية ..." class="form-control" id="work">
			                        </div>
			                        
			                        <div class="form-group">
			                        	<label class="white-text" for="masterclass">Attended Master Class before / هل حضرت ماستر كلاس من قبل</label>
			                        	<div>
			                        	<label for="radios-0" class="white-text">
										    <input type="radio" name="masterclass" id="radios-0" value="Yes / نعم"  >
										    Yes / نعم
									    </label>
									    </div>
									    <div>
									    <label for="radios-1"  class="white-text">
										    <input type="radio" name="masterclass" id="radios-1" value="No / لا" checked="checked">
										    No / لا
									    </label>
									    </div>
									    <!-- <div class="form-group">
									    	<label class="sr-only" for="masterclass_place">Master Class Place / مكان الماستر كلاس</label>
									    	<input type="text" name="masterclass_place" placeholder="Master Class Place / مكان الماستر كلاس ..." class="form-control" id="masterclass_place">
									    </div>
									    <div class="form-group">
				                    		<label class="sr-only" for="masterclass_date">Master Class Date / تاريخ الماستر كلاس</label>
				                        	<input type="text" name="masterclass_date" placeholder="Master Class Date / تاريخ الماستر كلاس ..." class="form-control" id="masterclass_date">
				                        </div> -->
      								</div>
									
			                        
			                        

			                        <div class="form-group">
										
										<!-- <div id="mytooltip">
											<label  class="white-text" for="workshops">Interested in / لدي اهتمام في</label>
											<a href="#" title="Press and hold CTRL/Command while selecting multiple options - اضغط على زر كنترول او كوماند لاختيار أكثر من اهتمام">&nbsp;<i class="fa fa-info-circle"></i></a>
										</div> -->
										
									     <!-- <select multiple id="workshops" name="workshops[]" placeholder="Interested in / لدي اهتمام في ..." class="form-control">
									     	<?php  foreach($workshops as $workshop) : ?>
										     	<option value="<?php echo $workshop->id; ?>"><?php echo $workshop->workshop_name_en . ' / ' . $workshop->workshop_name_ar; ?></option>
										    <?php endforeach; ?>
									     </select> -->
									     <div class="form-top">
									     	<div>
										     	<label class="white-text">Select Programs You Are Interested In</label><br>
										     	<label class="white-text">اختر البرامج التي تهمك</label>
									     	</div>
										     <?php  foreach($workshops as $workshop) : ?>
										     	<?php if ($workshop->active == 1): ?>
										     		<input type="checkbox" name="workshops[]" value="<?php echo $workshop->id; ?>">&nbsp;<label class="yellow-text"><?php echo $workshop->workshop_name_en . ' / ' . $workshop->workshop_name_ar; ?></label><br>
										     	<?php endif; ?>
										     <?php endforeach; ?>
									     </div>
			                        </div>

			                        <div class="form-group">
			                        	<label class="sr-only" for="note">Note / ملحوظات</label>
			                        	<textarea name="note" placeholder="Note / ملحوظات ..." class="form-control" id="note"></textarea>
			                        </div>


			                        <button type="submit" class="btn">Submit / ارسال</button>
			                    </form>
			                    
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <?php include 'admin_footer.php'; ?>


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script> -->
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="assets/js/jquery.datetimepicker.js"></script>
        <script src="assets/js/main.js"></script>
        <!-- <script src="assets/js/tooltips.js"></script> -->

        <!--[if !IE | (gt IE 8)]><!-->
		<script src="assets/js/tooltips.js"></script>
		<script>
			$(function() {
				$("#mytooltip a[title]").tooltips();
			});
		</script>
		<!--<![endif]-->
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>