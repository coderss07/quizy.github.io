<?php
    session_start();
    if($_SESSION['user']=='')
        die("<script>window.location = 'index.php';</script>");
    $fun=$_SESSION['user'];
    $fun2=$_SESSION['name'];
    //echo "<script>alert('$fun2');</script>";

    if($_SESSION['modify'])
        $test_id=$_SESSION['modify'];
    else 
        echo "<script>window.location.href='test.php'</script>";
?>
    <?php
        include "begin.php";
        include "sidebar.php";
        include "topbar.php";
        include "db.php";
    ?>
<div class="clearfix"></div>

<?php
    $q="select * from test where test_id='$test_id'";
    $result=mysqli_query($con,$q);
    $row=mysqli_fetch_array($result);
?>

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
                    <?php $name=$row['test_name'];?>
                    <input type="text" class="form-control" id="input-3"  name="test_name" value="<?php echo $name?>"disabled>
                </div>
                <div class="form-group">
                    <label for="input-2">Date</label>
                    <input type="date" class="form-control" id="input-3" value="<?php echo $row['test_date']?>" name="date">
                </div>
                <div class="form-group">
                    <label for="input-2">Starting Time</label>
                    <input type="time" class="form-control" id="input-3" value="<?php echo $row['s_time']?>" name="s_time">
                </div>
                <div class="form-group">
                    <label for="input-2">Ending Time</label>
                    <input type="time" class="form-control" id="input-3" value="<?php echo $row['e_time']?>" name="e_time">
                </div>
                <div class="form-group">
                    <label for="input-2">Each Question Score</label>
                    <input type="number" class="form-control" id="e_q_s" value="<?php echo $row['m_one_ques']?>" name="e_q_s">
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
                    <input type="radio"  id="chkNo" onclick="EnableDisableTextBox()" required name="Type" value="Test">&nbsp;&nbsp;<label for="input-1">Test</label>
                </div>
                <div class="form-group">
                    <label for="input-2">Test Duration (in min)</label>
                    <input type="number" class="form-control" id="test_hours" value="<?php echo $row['test_hrs']?>" name="test_hours">
                </div>
                <div class="form-group">
                 <button type="submit" name="submit" value="submit" class="btn btn-light px-5">Done</button>
                </div>
                 <script type="text/javascript">
    function EnableDisableTextBox() {
        var chkYes = document.getElementById("chkYes");
        var txtPassportNumber = document.getElementById("test_hours");
        txtPassportNumber.disabled = chkYes.checked ? false : true;
        if (!txtPassportNumber.disabled) {
            txtPassportNumber.focus();
        }
    }
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
            //$name=$name.$x;
            /*echo "<script>alert('$name');</script>";
            echo "<script>alert('$s_time');</script>";
            echo "<script>alert('$e_time');</script>";
            echo "<script>alert('$date');</script>";
            echo "<script>alert('$e_q_s');</script>";
            echo "<script>alert('$test_hrs');</script>";
            echo "<script>alert('$type');</script>";
            echo "<script>alert('$given_ by');</script>";*/
            $q="UPDATE `test` SET `s_time`='$s_time',`e_time`='$e_time',`test_date`='$date',`m_one_ques`='$e_q_s',`test_hrs`='$test_hours',`type`='$type',`given_by`='$given_by' WHERE `test_name`='$name';";
            echo "<script>alert('$q');</script>";
            mysqli_query($con,$q);
            echo "<script>alert('The test is successfully modified ');window.location.href='test.php'</script>";
        }
    ?>

  <?php
    include "end.php";
  ?>