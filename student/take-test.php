<?php
    include "top.php";
    include "header.php";
    include "section.php";
?>

<?php
    if($_SESSION['test_name']=='')
        die("<script>window.location.href='control-panel.php'</script>");
?>
	<main id="main">
		<section id="cta" class="cta">
			<div class="container">

				<div class="row" data-aos="zoom-out">
					<div class="col-lg-9 text-center text-lg-start">
						<h3><?php echo $_SESSION['test_name'] ?></h3>
						<p>Rules to be followed :</p>
						<p>
						<ul>
							<li>you will find numerous sample questions.</li>
							<li>This quiz is set up with random questions and the question's answer are also random.
							</li>
							<li>You can navigate to any question by just clicking the question number.</li>
							<li>You can alse navigate to next or previous question by clicking the next/previous.</li>
							<li>You can finish the quiz by just clicking the finish button at last questions.</li>
						</ul>
						</p>
					</div>
					<div class="col-lg-3 cta-btn-container text-center">
						<a class="cta-btn align-middle" href="../quiz/quiz.php" target="_blank">Start Test</a>
					</div>
				</div>

			</div>
		</section>

	</main><!-- End #main -->

<?php
    include "footer.php";
    include "end.php";
?>