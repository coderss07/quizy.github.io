<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Register - For student</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="/assets/css/loginsignup.css">
    <link rel="stylesheet" href="/assets/css/register.css">
    <link href="/assets/css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>

</head>

<?php
    $con=mysqli_connect("sql312.epizy.com","epiz_31043550","CONFguCn21dp3x3");
    mysqli_select_db($con,"epiz_31043550_hacktesters");
?>


<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center ">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1><a href="index.html">Quizy</a></h1>
                <a href="index.html"><img src="assets/img/logo.png" alt="Quizy" class="img-fluid"></a>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
                    <li><a class="nav-link scrollto" href="index.php#about">About</a></li>
                    <li><a class="nav-link scrollto" href="index.php#services">Services</a></li>
                    <li><a class="nav-link scrollto" href="index.php#team">Team</a></li>
                    <li><a class="nav-link scrollto" href="index.php#faq">Help</a></li>
                    <li><a class="nav-link scrollto" href="index.php#contact">Contact</a></li>
                    <li><a href="/signup.php" id="sign-in-btn" class="nav-link scrollto ls-btn">Sign Up / Sign In</a>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main id="main">
        <div class="container-1">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="/assets/img/signup-img.jpg" alt="">
                </div>
                <div class="signup-form">
                    <form method="get" role="form" class="register-form" id="st-register-form">

                        <h2>student registration form</h2>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">First Name :</label>
                                <input type="text" name="fname" required>
                            </div>
                            <div class="form-group">
                                <label for="father_name">Last Name :</label>
                                <input type="text" name="lname" id="lname" required/>
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="address">Email :</label>
                            <input type="email" name="email" id="email" required/>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="pass">Password :</label>
                                <div class="password-eye">
                                    <input class="password" type="password" name="password" id="password" required/>
                                    <i class="eye-r ri-eye-fill open-eye"></i>
                                    <i class="eye-r ri-eye-off-fill close-eye"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="confirm-pass">Confirm Password :</label>
                                <input type="password" name="c-password" id="c-password" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="course">School Name:</label>
                            <div class="form-select">
                                <select name="school" id="school">
                                
                                <?php
                                    $q="SELECT DISTINCT(school) FROM `teacher`";
                                    $result=mysqli_query($con,$q);
                                    $num=mysqli_num_rows($result);
                                    //echo "<script>alert('$num');</script>";
                                    for($i=0;$i<$num;$i++)
                                    {
                                        $row=mysqli_fetch_array($result);
                                        $x=$row['school'];

                                    ?>
                                    <option value="<?php echo $x?>"><?php echo $x?></option>
                                <?php   
                                    }
                                ?>
                                
                                    <option value="">Select</option>
                                    <option value="btech">B.Tech</option>
                                    <option value="desiger">Designer</option>
                                    <option value="marketing">Marketing</option>
                                
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="birth_date">Subject </label>
                            <input type="text" name="subject" id="subject">
                        </div>
                        
                        <div class="form-submit">
                            <input type="reset" value="Reset All" class="submit" name="reset" id="reset" />
                            <input type="submit" value="Register" class="submit" name="submit" id="submit">
                        </div>
                        <div class="my-3">
                            <div class="error-message"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main><!-- End #main -->
    
    <!--<div id="student-otp" class="Modal is-hidden is-visuallyHidden">
		<form class="form-design" action="" id="student-otp-box">
			<i onclick="close_modal('student-otp')" class="Close">&times;</i>
            <label for="otp">Enter otp send to your email id :</label>
			<input type="number" name="otp" id="otp">
            <a class="forgot" href="#">Resend mail</a>
			<button class="btn" >Submit</button>
		</form>
	</div>-->


    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <h3>Quizy</h3>
            <p>An online platform for taking quiz & test.</p>
            <div class="social-links">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
            <div class="copyright">
                &copy; Copyright <strong><span>Quizy</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="https://coderss07.github.io/" target="_blank">Sarthak Sharma, Abhay Rawat & Saurabh
                    Bisht </a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/assets/vendor/aos/aos.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
    
    <!-- Template Main JS File -->
    <script src="assets/vendor/registration-validate/student-validate.js"></script>
    <script src="/assets/javascript/main.js"></script>

</body>
</html>
<script>
/*$(document).ready(function(){
    $("select#school").change(function(){
        var selectedCourse = $(this).children("option:selected").val();
        alert("You have selected the country - " + selectedCourse); 
    });
});*/
</script>

<?php
    /*if(isset($_GET['submit']))
    {
        echo "<script>alert('aman');</script>";
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $pass=$_POST['password'];
        $email=$_POST['email'];
        $school=$_POST['school'];
        $subject=$_POST['subject'];
        echo "<script>alert('$fname');</script>";
        echo "<script>alert('$lname');</script>";
        echo "<script>alert('$pass');</script>";
        echo "<script>alert('$email');</script>";
        echo "<script>alert('$subject');</script>";
        echo "<script>alert('$school');</script>";
    }*/
?>