<?php
    session_start();
    $x=$_SESSION['user_option'];
    echo "<script>alert('$x')</script>";
?>  