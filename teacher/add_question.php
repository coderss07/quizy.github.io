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
    {
        $test_name=$_SESSION['test_name'];
        //echo "<script>alert('$test_name');</script>";
    }
?>

    <?php
        include "begin.php";
        //include "sidebar.php";
        //include "topbar.php";
        include "db.php";
    ?>
<div class="clearfix"></div>

<div class="content-wrapper">
    <div class="container-fluid">


        <div class="row mt-3" id="form">
      <div class="col-lg-10">
         <div class="card">
           <div class="card-body">
           <div class="card-title">Add Question</div>
            <hr>
            <form method="post">
                <div class="form-group">
                    <?php
                    $q="select ques_no from $test_name";
                    $xyz=mysqli_num_rows(mysqli_query($con,$q));
                    ?>
                    <label for="input-3">Question:<?php echo $xyz+1?></label>
                    <input type="text" class="form-control" id="input-3" name="ques" placeholder="Enter Question" required name="in_sub">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="f_option" placeholder="First Option"required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="s_option" placeholder="Second Option" required>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="t_option" placeholder="Third Option"required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="fth_option" placeholder="Fourth Option" required>
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
                <button class="btn btn-light px-5" value="add_ques" name="add_ques">Add Question</button>
                    <button type="submit" name="Finshed" value="Finshed" class="btn btn-light px-5">Finshed</button>
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
    if(isset($_POST['add_ques']) || isset($_POST['Finshed']))
    {
        //echo "<script>alert('aman');</script>";
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
        $q="insert into $test_name values($xyz+1,'$ques','$choice1','$choice2','$choice3','$choice4','$x');";
        mysqli_query($con,$q);
        if(isset($_POST['Finshed']))
        {
            unset($_SESSION['test_name']);
            echo "<script>window.location.href='test.php';</script>";
        }
        else
            echo "<script>window.location.href='add_question.php';</script>";
    }
?>