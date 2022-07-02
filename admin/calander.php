    <?php
    session_start();
    if($_SESSION['user']=='')
        die("<script>window.location = 'index.php';</script>");
?>
    <?php
        include "begin.php";
        include "sidebar.php";
        include "topbar.php";
        include "end.php";
    ?>


<div class="clearfix"></div>
	
  