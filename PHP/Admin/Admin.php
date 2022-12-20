 <?php

    if (session_status() >= 0) {
        session_start();
        if (isset($_SESSION["user_name"])) {
            header("refresh: 0; url=Adminhome.php");
        }
    }

    ?>


<!DOCTYPE html>
<html lang="en">

<head>
<title>Animated Login Form</title>
	<link rel="stylesheet" type="text/css" href="../Admin/css/adlogstyle.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../Images/ticon.svg" type="image/icon type">
</head>

<body>
   
    <img class="wave" src="img/admin.svg">
	<div class="container">
		<div class="img">
			
		</div>
		<div class="login-content">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			
				<h2 class="title">Admin</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" name="user_name" class="input" value="" required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" name="user_pass" class="input" value="" required>
            	   </div>
            	</div>
            	
            	<input type="submit" name="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="../Admin/js/main.js"></script>






</body>

</html>
    <?php

    if (isset($_POST["submit"])) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $user_name = $_POST['user_name'];
            $user_pass = $_POST['user_pass'];
            if ($user_name == "admin" && $user_pass == "123") {

                $_SESSION["user_name"] = $_POST["user_name"];
                header("refresh: 0; url=Adminhome.php");
                exit();
            } else {
                echo '<script>alert("Credentials incorrect")</script>';
            }
        }
    }

    ?>