<?php 

	session_start();
	require 'models/db_connect.php';

	if (isset($_POST['submitted'])) {
		$uname = $_POST['username'];
        $pwd = $_POST['password'];

        $query = "SELECT * FROM tbladmin WHERE ad_user='$uname' AND ad_pass='$pwd'";
        $result = $db->query($query);
        
        if($result)
        {
            if($result->rowCount() == 1)
            {
                $_SESSION['admin'] = $uname;
                header("Location: admin.php");
                // if ($_SESSION['admin'] == 'ali'){
                //     // header("Location: admin.php?username=".$_POST['username']);
                //     header("Location: admin.php");
                // } else {
                //     echo "I know You Are: " . $_SESSION['admin'] . ", But you are not permited to see the content. Sorry!!";
                // }
            }
            else
            {
                $error = 'Invalid Username or Password.';
            }
        }
	}




 ?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Login</title>
  <link rel="stylesheet" href="assets/css/login-style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>

	<div class="container-fluid">
    <div class="row-fluid">
      <form method="post" action="" class="login">
      	
        <p>
          <label for="username">Username:</label>
          <input type="text" name="username" id="username">
        </p>

        <p>
          <label for="password">Password:</label>
          <input type="password" name="password" id="password">
        </p>

        <p class="login-submit">
          <button type="submit" name="submitted" class="login-button">Login</button>
        </p>

        <p>
    	    <div class="error">
    	    	<h2>
    		 		<?php 
    			 		if (!empty($error)){
    			 			echo $error;
    			 		} 
    		 		?>
    		 	</h2>
    		 </div>
        </p>

        <!-- <p class="forgot-password"><a href="index.html">Forgot your password?</a></p> -->
      </form>
    </div>
  </div>

</body>
</html>
