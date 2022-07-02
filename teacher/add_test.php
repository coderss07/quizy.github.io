<?php
    session_start();
    if($_SESSION['user']=='')
        die("<script>window.location = 'index.php';</script>");
    $fun=$_SESSION['user'];
    $fun2=$_SESSION['name'];
    //echo "<script>alert('$fun2');</script>";
?>
    <?php
        include "begin.php";
        include "sidebar.php";
        include "topbar.php";
        include "db.php";
    ?>
<div class="clearfix"></div>
	
<div class="content-wrapper">
    <div class="container-fluid">
        
    
    <div class="row mt-3">
      <div class="col-lg-10">
         <div class="card">
           <div class="card-body">
           <div class="card-title">Test</div>
            <hr>
            <form method="post">
                <div class="form-group">
                    <label for="input-3">Test Name</label>
                    <input type="text" class="form-control" id="input-3" placeholder="Enter Test Name" required name="test_name">
                </div>
                <div class="form-group">
                    <label for="input-2">Date</label>
                    <input type="date" class="form-control" id="input-3" required name="date">
                </div>
                <div class="form-group">
                    <label for="input-2">Starting Time</label>
                    <input type="time" class="form-control" id="input-3" required name="s_time">
                </div>
                <div class="form-group">
                    <label for="input-2">Ending Time</label>
                    <input type="time" class="form-control" id="input-3" required name="e_time">
                </div>
                <div class="form-group">
                    <label for="input-2">Each Question Score</label>
                    <input type="number" class="form-control" id="e_q_s" required name="e_q_s">
                </div>
                <div class="form-group">
                    <label for="input-2">Given By</label>
                    <select name="given_by" class="form-control" >
                    <option value="specific">Our School Student</option>
                    <option value="all">Our and Others School Student</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="input-1">Type</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio"  id="chkYes" required name="Type" value="mock_test">&nbsp;&nbsp;<label for="input-1">Mock Test</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio"  id="chkNo" required name="Type" value="Test">&nbsp;&nbsp;<label for="input-1">Test</label>
                </div>
                <div class="form-group">
                    <label for="input-2">Test Duration (in min)</label>
                    <input type="number" class="form-control" id="test_hours" required name="test_hours">
                </div>
                <div class="form-group">
                 <button type="submit" name="submit" value="submit" class="btn btn-light px-5">Done</button>
                </div>
                 <script type="text/javascript">
    /*function EnableDisableTextBox() {
        var chkYes = document.getElementById("chkYes");
        var txtPassportNumber = document.getElementById("test_hours");
        txtPassportNumber.disabled = chkYes.checked ? false : true;
        if (!txtPassportNumber.disabled) {
            txtPassportNumber.focus();
        }
    }*/
</script> 
    
            </form>
             </div>
            </div>
        </div>
    </div>


        
	  <!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->

    </div>
    <!-- End container-fluid-->

    <?php
        if(isset($_POST['submit']))
        {
            $name=$_POST['test_name'];
            $date=$_POST['date'];
            $s_time=$_POST['s_time'];
            $e_time=$_POST['e_time'];
            if($s_time>=$e_time)
            {
                die("<script>alert('Time is wrong');window.location = 'add_test.php';</script>");
            }
            $type=$_POST['Type'];
            $test_hours=$_POST['test_hours'];
            $e_q_s=$_POST['e_q_s'];
            $given_by=$_POST['given_by'];
            $q="select test_id from test ORDER BY test_id DESC LIMIT 1;";
            $result=mysqli_query($con,$q);
            $row=mysqli_fetch_array($result);
            $x=$row['test_id']+1;
            $name=$name.$x;
            echo "<script>alert('$name');</script>";
            $q="INSERT INTO `test`(`test_id`,`test_name`, `create_by`, `s_time`, `e_time`, `test_date`, `aproval`, `m_one_ques`, `test_hrs`, `type`,`given_by`) VALUES ($x,'$name','$fun','$s_time','$e_time','$date','Not Given','$e_q_s','$test_hours','$type','$given_by');";
            mysqli_query($con,$q);
            $q="create table $name (ques_no int,question varchar(500),choice1 varchar(100),choice2 varchar(100), choice3 varchar(100), choice4 varchar(100),correct varchar(100));";
            mysqli_query($con,$q);
            $_SESSION['test_name']=$name;
            echo "<script>alert('the test is successfully added ');window.location.href='test_type.php'</script>";
        }
    ?>

  <?php
    include "end.php";
  ?>