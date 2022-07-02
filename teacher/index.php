<?php
    session_start();
    include "db.php";
    //echo "<script>window.location.href='http://programminghead.com';</script>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Teacher Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../admin/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../admin/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../admin/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../admin/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../admin/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../admin/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../admin/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../admin/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../admin/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../admin/css/util.css">
	<link rel="stylesheet" type="text/css" href="../admin/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('../admin/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-49">
						Teacher Login
					</span>
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Type your username" required>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Type your password" required>
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
						<a href="#">
							Forgot password?
						</a>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="login">
								Login
							</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="../admin/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../admin/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../admin/vendor/bootstrap/js/popper.js"></script>
	<script src="../admin/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../admin/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../admin/vendor/daterangepicker/moment.min.js"></script>
	<script src="../admin/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../admin/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>


<?php
    //echo "<script>window.location.href='aman.php';</script>";
    ob_start();
    ob_end_flush();
    if(isset($_POST['login']))
    {
        //echo "<script>alert('aman');</script>";
        $username=$_POST['username'];
        $pass=$_POST['pass'];
        $_SESSION['user']='';
        $_SESSION['name']='';
        //echo "<script>alert('$username'+'$pass');</script>";
        $q="select email,pass from teacher where email='$username' and pass='$pass'";
        $result=mysqli_query($con,$q);
        $row=mysqli_num_rows($result);
        //echo "<script>alert('$row');</script>";
        if($row==1)
        {

            $q="select fname,lname,aproval,email from teacher where aproval='Given' and email='$username';";
            $result=mysqli_query($con,$q);
            $row=mysqli_num_rows($result);
            //echo "<script>alert('$row');</script>";
            if($row==1)
            {
                $x=mysqli_fetch_array($result);
                $_SESSION['user']=$username;
                $_SESSION['name']=$x['fname'].' '.$x['lname'];
                echo "<script>window.location.href='dashboard.php'</script>";
            }
            else
                echo "<script>alert('The aproval is not given by admin');</script>";
        }
        else
        {
            echo "<script>alert('The username or password is wrong');</script>";
        }
        //echo "<script>alert('$row');</script>";
    }
?>