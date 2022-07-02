<?php
    session_start();
    if($_SESSION['user']=='')
        die("<script>window.location = 'index.php';</script>");
?>
<!-- Start wrapper-->
 <div id="wrapper">

  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="dashboard.php">
       <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
       <h5 class="logo-text">Examination Admin</h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">MAIN NAVIGATION</li>
      <li>
        <a href="dashboard.php">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

      <li>
        <a href="student.php">
          <i class="zmdi zmdi-accounts"></i> <span>Students</span>
        </a>
      </li>

      <li>
        <a href="teacher.php">
          <i class="zmdi zmdi-account-circle"></i> <span>Teachers</span>
        </a>
      </li>

      <li>
        <a href="announcement.php">
          <i class="zmdi zmdi-assignment"></i> <span>Announcement</span>
        </a>
      </li>

      <li>
        <a href="calendar.php">
          <i class="zmdi zmdi-calendar-check"></i> <span>Calendar</span>
          <small class="badge float-right badge-light">New</small>
        </a>
      </li>

      <li>
        <a href="test.php">
          <i class="zmdi zmdi-card"></i> <span>Tests</span>
        </a>
      </li>

      <li>
        <a href="result.php">
          <i class="zmdi zmdi-format-list-bulleted"></i> <span>Results</span>
        </a>
      </li>
    </ul>
   
   </div>
   <!--End sidebar-wrapper-->
