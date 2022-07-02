<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1.0" name="viewport">

		<title>Login - Quizy</title>
		<meta content="" name="description">
		<meta content="" name="keywords">

		<!-- Favicons -->
		<link href="/assets/img/favicon.png" rel="icon">
		<link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

		<!-- Google Fonts -->
		<link href="/https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

		<!-- Vendor CSS Files -->
		<link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
		<link href="/assets/vendor/aos/aos.css" rel="stylesheet">
		<link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
		<link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
		<link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
		<link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
		<link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

		<!-- Template Main CSS File -->
		<link href="/assets/css/style.css" rel="stylesheet">
		<link rel="stylesheet" href="/assets/css/loginsignup.css">

	</head>

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
					<li><a class="nav-link scrollto active" href="index.html">Home</a></li>
					<li><a class="nav-link scrollto" href="index.html#about">About</a></li>
					<li><a class="nav-link scrollto" href="index.html#services">Services</a></li>
					<li><a class="nav-link scrollto" href="index.html#team">Team</a></li>
					<li><a class="nav-link scrollto" href="index.html#faq">Help</a></li>
					<li><a class="nav-link scrollto" href="index.html#contact">Contact</a></li>
					<li><a href="/signup.html" id="sign-in-btn" class="nav-link scrollto ls-btn">Sign In</a>
					<li><a href="/login.html" id="log-in-btn" class="nav-link scrollto ls-btn">Log In</a></li>
				</ul>
				<i class="bi bi-list mobile-nav-toggle"></i>
			</nav><!-- .navbar -->

		</div>
  	</header><!-- End Header -->

  	<main id="main">
		<h1>Login</h1>
		<div class="Join-container">
			<div class="logsign-box">
				<h2>For Admin</h2>
				<p>For Maintainance</p>
				<button class="btn" onclick="window.open('./admin','_self')" id="admin-login">Login</button>
				<div> Only Administrators can login. </div>
			</div> 

			<div class="logsign-box">
				<h2>For Teacher</h2>
				<p>For conducting test, quiz, etc.</p>
				<button class="btn" onclick="open_modal('teacher-model')" id="teacher-login">Login</button>
				<div> Don't have an account? <a href="/signup.html">Sign Up</a></div>
			</div>
				
			<div class="logsign-box">
				<h2>For Student</h2>
				<p>Join for practice</p>
				<button class="btn" onclick="open_modal('student-model')" id="student-login">Login</button>
				<div> Don't have an account? <a href="/signup.html">Sign Up</a></div>
			</div>       

		</div>
    
	</main><!-- End #main -->

	<!-- open moodle -->
	<div id="admin-model" class="Modal is-hidden is-visuallyHidden">
		<form class="form-design" action="" id="log-in-admin">
			<i onclick="close_modal('admin-model')" class="Close">&times;</i>
			<h2>Login for Admin</h2>
			<input type="email" placeholder="Email id (abc@example.com)">
			<div class="password-box">
				<input class="password" type="password" placeholder="Password">
				<i class="eye ri-eye-fill open-eye"></i>
				<i class="eye ri-eye-off-fill close-eye"></i>
			</div>
			<a class="forgot" href="#">Forgot your password</a>
			<button class="btn">Log In</button>
		</form>
	</div>

	<div id="teacher-model" class="Modal is-hidden is-visuallyHidden">
		<form class="form-design" action="" id="log-in-teacher">
			<i onclick="close_modal('teacher-model')" class="Close">&times;</i>
			<h2>Login for Teacher</h2>
			<input type="email" placeholder="Email id (abc@example.com)">
			<div class="password-box">
				<input class="password" type="password" placeholder="Password">
				<i class="eye ri-eye-fill open-eye"></i>
				<i class="eye ri-eye-off-fill close-eye"></i>
			</div>
			<a class="forgot" href="#">Forgot your password</a>
			<button class="btn">Log In</button>
		</form>
	</div>

	<div id="student-model" class="Modal is-hidden is-visuallyHidden">
		<form class="form-design" action="" id="log-in-student">
			<i onclick="close_modal('student-model')" class="Close">&times;</i>
			<h2>Login for Student</h2>
			<input type="email" placeholder="Email id (abc@example.com)">
			<div class="password-box">
				<input class="password" type="password" placeholder="Password">
				<i class="eye ri-eye-fill open-eye"></i>
				<i class="eye ri-eye-off-fill close-eye"></i>
			</div>
			<a class="forgot" href="#">Forgot your password</a>
			<button class="btn">Log In</button>
		</form>
	</div> <!-- end mosle -->

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
			Designed by <a href="https://coderss07.github.io/" target="_blank">Sarthak Sharma, Abhay Rawat & Saurabh Bisht </a>
		</div>
	</div>
</footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>

</body>
</html>