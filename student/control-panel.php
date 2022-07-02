<?php
    include "db.php";
    session_start();
    $user=$_SESSION['user'];
    $name=$_SESSION['name'];
?>
	
    
<?php
    include "top.php";
    include "header.php";
    include "section.php";
    //echo "<script>alert('aman');</script>";
?>
    <main id="main">
		<section class="services inner-page">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-6">
						<div class="icon-box" data-aos="zoom-in-left">
							<div class="icon"><i class="bi bi-briefcase" style="color: #ff689b;"></i></div>
							<h4 class="title"><a href="view_test.php">View Test</a></h4>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 mt-5 mt-md-0">
						<div class="icon-box" data-aos="zoom-in-left" data-aos-delay="100">
							<div class="icon"><i class="bi bi-book" style="color: #e9bf06;"></i></div>
							<h4 class="title"><a href="">View Results</a></h4>
							<!-- <p class="description">The Administrator of the system has authority to propose tests or
								papers. The candidate can login through proposed computer and mobile phones and Then
								they can attend the quiz or test.</p> -->
						</div>
					</div>

					<div class="col-lg-4 col-md-6 mt-5 mt-lg-0 ">
						<div class="icon-box" data-aos="zoom-in-left" data-aos-delay="200">
							<div class="icon"><i class="bi bi-card-checklist" style="color: #3fcdc7;"></i></div>
							<h4 class="title"><a href="test-demo.php">Take Demo Test</a></h4>
						</div>
					</div>
				</div>
			</div>
		</section>

	</main><!-- End #main -->

    <?php
        include "footer.php";
        include "end.php";
    ?>