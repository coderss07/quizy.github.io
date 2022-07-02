<!-- ======= Header ======= -->
	<header id="header" class="fixed-top d-flex align-items-center ">
		<div class="container d-flex align-items-center justify-content-between">

			<div class="logo">
				<a href="../index.php"><img src="../assets/img/logo.png" alt="" class="img-fluid"></a>
			</div>

			<nav id="navbar" class="navbar">
				<ul>
					<li><a class="nav-link scrollto" href="../index.php">Home</a></li>
					<li><a class="nav-link scrollto" href="../index.php#about">About</a></li>
					<li><a class="nav-link scrollto" href="../index.php#services">Services</a></li>
					<li><a class="nav-link scrollto" href="../index.php#team">Team</a></li>
					<li><a class="nav-link scrollto" href="../index.php#faq">Help</a></li>
					<li><a class="nav-link scrollto" href="../index.php#contact">Contact</a></li>
					<li>
						<div class="action">
							<div class="profile" onclick="menuToggle();">
								<img id="drop" src="images/icon/avatar-01.jpg" />
							</div>
							<div id="menu">
								<a href="control-panel.html"><h3>Hello<br /><span><?php echo $name?></span></h3></a>
								<ul>
									<li><i class="fa-solid fa-user"></i><a href="#">Profile</a></li>
									<li><i class="fa-solid fa-gear"></i><a href="#">Setting</a></li>
									<li><i class="fa-solid fa-power-off"></i><a href="#">Logout</a></li>
								</ul>
							</div>
						</div>
					</li>
				</ul>
				<i class="bi bi-list mobile-nav-toggle"></i>
			</nav><!-- .navbar -->

		</div>
	</header><!-- End Header -->