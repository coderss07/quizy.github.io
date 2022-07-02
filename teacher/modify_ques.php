<?php
    session_start();
    if($_SESSION['user']=='')
        die("<script>window.location = 'index.php';</script>");
    $fun=$_SESSION['user'];
    $fun2=$_SESSION['name'];
    //echo "<script>alert('$fun2');</script>";
    
    if($_SESSION['test_name']=='')
        die("<script>window.location = 'test.php';</script>");
    else
        $test_name=$_SESSION['test_name'];
    
    if($_GET['edit']=='')
        die("<script>window.location='view_test.php';</script>");
    else
        $ques_no=$_GET['edit'];
?>

    <?php
        include "begin.php";
        //include "sidebar.php";
        //include "topbar.php";
        include "db.php";
    ?>
<div class="clearfix"></div>

<?php
    //echo "<script>alert('$test_name');</script>";
    $q="select * from $test_name where ques_no='$ques_no';";
    $result=mysqli_query($con,$q);
    $num=mysqli_num_rows($result);
    //echo "<script>alert('$num');</script>";
    $row=mysqli_fetch_array($result);
?>

<div class="content-wrapper">
    <div class="container-fluid">


        <div class="row mt-3" id="form">
      <div class="col-lg-10">
         <div class="card">
           <div class="card-body">
           <div class="card-title">Modify Question</div>
            <hr>
            <form method="post">
                <div class="form-group">
                    <label for="input-3">Question:<?php echo $row['ques_no']?></label>
                    <input type="text" class="form-control" id="input-3" name="ques" value="<?php echo $row['question']?>" name="in_sub">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="f_option" value="<?php echo $row['choice1']?>" placeholder="First Option"required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="s_option" value="<?php echo $row['choice2']?>" placeholder="Second Option" required>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="t_option" value="<?php echo $row['choice3']?>" placeholder="Third Option"required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="fth_option" value="<?php echo $row['choice4']?>" placeholder="Fourth Option" required>
                        </div>
                    </div>
                </div>
                
                
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <select class="form-control" name="ans">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                <button  type="submit" class="btn btn-light px-5" value="<?php $ques_no ?>" name="modify_ques">Modify Question</button>
                    <button  type="submit"name="cancel" value="cancel" class="btn btn-light px-5">Cancel</button>
                </div>
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
    include "end.php";
  ?>
<style>
    label
    {
        font-size:20px;
    }
</style>


<?php
    if(isset($_POST['modify_ques']))
    {
        //echo "<script>alert('aman');</script>";
        $no=$ques_no;
        $ques=$_POST['ques'];
        $choice1=$_POST['f_option'];
        $choice2=$_POST['s_option'];
        $choice3=$_POST['t_option'];
        $choice4=$_POST['fth_option'];
        $ans=$_POST['ans'];
        $x="";
        if($ans=="A")
            $x=$choice1;
        else if($ans=="B") 
            $x=$choice2;
        else if($ans=="C")
            $x=$choice3;
        else
            $x=$choice4;
        $q="UPDATE `$test_name` SET `question`='$ques',`choice1`='$choice1',`choice2`='$choice2',`choice3`='$choice3',`choice4`='$choice4',`correct`='$x' WHERE `ques_no`=$no;";
        mysqli_query($con,$q);
        echo "<script>window.location.href='view_test.php'</script>";
    }
    if(isset($_POST['cancel']))
    {
        echo "<script>window.location.href='view_test.php'</script>";
    }
?>