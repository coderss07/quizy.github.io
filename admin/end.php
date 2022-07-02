  <?php
    session_start();
    if($_SESSION['user']=='')
        die("<script>window.location = 'index.php';</script>");
?>
  <!--
  <div class="content-wrapper">
    <div class="container-fluid">

    
      
	--start overlay
		  <div class="overlay toggle-menu">
        

      </div>
		end overlay
	
    </div>  
     End container-fluid
   </div> End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer-->


	<footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © 2022 Made by Abhay Rawat, Sarthak Sharma and Saurabh Bisht
        </div>
      </div>
    </footer>
	<!--End footer-->
	
  </div><!--End wrapper-->

<!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	
  <!-- simplebar js -->
  <script src="assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>
	
</body>
</html>
