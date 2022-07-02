    <?php
    session_start();
    if($_SESSION['user']=='')
        die("<script>window.location = 'index.php';</script>");
?>
    <?php
        include "begin.php";
        include "sidebar.php";
        include "topbar.php";
        include "db.php";
        $fun=$_SESSION['user'];
        $fun2=$_SESSION['name'];
    ?>
<div class="clearfix"></div>
	
<div class="content-wrapper">
    <div class="container-fluid">


    
        <?php
            $q="select * from student where aproval='Not Given'";
            $result=mysqli_query($con,$q);
            $num=mysqli_num_rows($result);
        ?>
      <div class="row">
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Student Request</h5>
			  <div class="table-responsive">
               <table class="table table-striped" style="text-align:center;">
                  <thead>
                    <tr>
                      <th scope="col">Student Id</th>
                      <th scope="col">Name</th>
                      <th scope="col">Subject</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        for($i=0;$i<$num;$i++)
                        {
                            $row=mysqli_fetch_array($result);
                    ?>
                    <tr>
                      <th scope="row"><?php echo $row['studentid']?></th>
                      <td><?php echo $row['fname']." ".$row['lname']?></td>
                      <td><?php echo $row['subject']?></td>
                      <td>
                        <!--<pre><input type="submit" value="Accept" class="btn btn-success" style="color:white;font-size:12px">   <input type="submit" value="Reject" class="btn btn-danger" id="y"></pre> -->
                        <form method="post">
                        <pre><button type="submit" class="btn btn-success" style="font-size:15px;padding:5px;font-weight:bold;" name='accept' value=<?php echo $row['studentid']; ?> >Accept</button>  <button type="submit" class="btn btn-danger" style="font-size:15px;padding:5px;font-weight:bold;" name='reject' value=<?php echo $row['studentid']; ?> >Reject</button></pre>
                        </form>
                      </td>
                    </tr>
                    <?php
                        }
                    ?>
                  </tbody>
                </table>
            </div>
            </div>
          </div>
        </div>
      </div><!--End Row-->


      <div class="row">
        <?php
            $q="select * from student where aproval='Given'";
            $result=mysqli_query($con,$q);
            $num=mysqli_num_rows($result);
        ?>
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Student Details</h5>
			  <div class="table-responsive">
               <table class="table table-striped" style="text-align:center;">
                  <thead>
                    <tr>
                      <th scope="col">SNo.</th>
                      <th scope="col">Name</th>
                      <th scope="col">Subject</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    //echo "<script>alert('$num');</script>";
                    for($i=0;$i<$num;$i++)
                    {
                        $row=mysqli_fetch_array($result);
                        $x=$row['studentid'];
                        //echo "<script>alert('$x');</script>";
                  ?>
                    <tr>
                      <th scope="row"><?php echo $row['studentid']?></th>
                      <td><?php echo $row['fname'].' '.$row['lname']?></td>
                      <td><?php echo $row['subject']?></td>
                      <td>
                      <form method="post">
                        <!--<pre><input type="submit" value="Accept" class="btn btn-success" style="color:white;font-size:12px">   <input type="submit" value="Reject" class="btn btn-danger" id="y"></pre> -->
                        <pre><button type="submit" class="btn btn-success" style="font-size:15px;padding:5px;font-weight:bold;" onclick="fun()" name="edit" value=<?php echo $row['studentid']?> >Edit</button>  <button type="submit" class="btn btn-dark" style="font-size:15px;padding:6px;font-weight:bold;" name='Block' value=<?php echo $row['studentid']?> >Block</button></pre>
                    </form>
                      </td>
                    <?php
                    }
                    ?>
                    </tr>
                  </tbody>
                </table>
            </div>
            </div>
          </div>
        </div>
      </div><!--End Row-->



      <div class="row">
        <?php
           $q="select * from student where aproval='Block'";
           $result=mysqli_query($con,$q);
           $num=mysqli_num_rows($result);
        ?>
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Block Student Details</h5>
			  <div class="table-responsive">
               <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">SNo.</th>
                      <th scope="col">Name</th>
                      <th scope="col">Blocked By</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                        //echo "<script>alert('$num');</script>";
                        for($i=0;$i<$num;$i++)
                        {
                            $row=mysqli_fetch_array($result);
                  ?>
                    <tr>
                      <th scope="row"><?php echo $row['studentid']?></th>
                      <td><?php echo $row['fname'].' '.$row['lname']?></td>
                      <td>Admin</td>
                      <td>
                        <!--<pre><input type="submit" value="Accept" class="btn btn-success" style="color:white;font-size:12px">   <input type="submit" value="Reject" class="btn btn-danger" id="y"></pre> -->
                        <form method="POST">
                        <pre><button type="submit" class="btn btn-warning" style="font-size:15px;padding:5px;font-weight:bold;" value=<?php echo $row['studentid']?>  name="unblock" >Unblock</button></pre>
                        </form>
                      </td>
                    </tr>
                    <?php
                         
                        } 
                    ?>
                  </tbody>
                </table>
            </div>
            </div>
          </div>
        </div>
      </div><!--End Row-->

    <div class="row mt-3" id="form" style="display:none">
    <?php
    if(isset($_POST['edit']))
    {
        echo "<script>document.getElementById('form').style.display='block';</script>";
        $s=$_POST['edit'];
        $q="select * from student where studentid='$s'";
        $result=mysqli_query($con,$q);
        $num=mysqli_num_rows($result);
        $row=mysqli_fetch_array($result);
        
    ?>
      <div class="col-lg-10">
         <div class="card">
           <div class="card-body">
           <div class="card-title">Student Details Edit</div>
            <hr>
            <form method="post">
                <div class="form-group">
                    <pre><label for="input-1">Student Id:<?php echo $row['studentid']?></label>                      <label for="input-1">Email:<?php echo $row['email']?></label></pre>
                </div>
                <div class="form-group">
                    <label for="input-3">Fname</label>
                    <input type="text" class="form-control" id="input-3" name="fname" value=<?php echo $row['fname']?> >
                </div>
                <div class="form-group">
                    <label for="input-2">Lname</label>
                    <input type="text" class="form-control" id="input-3" name="lname" value=<?php echo $row['lname']?>>
                </div>
                
                <div class="form-group">
                    <label for="input-2">School Name</label>
                    <input type="text" class="form-control" id="input-3" name="school_name" value="<?php echo $row['school_name']?>" >
                </div>

                
                <div class="form-group">
                    <label for="input-2">Subject</label>
                    <input type="text" class="form-control" id="input-3" name="subject" value=<?php echo $row['subject']?>>
                </div>

                <div class="form-group">
                <button class="btn btn-light px-5" onclick="fun2()" name="back">Back</button>
                    <button type="submit" name="edit_submit"  class="btn btn-light px-5" value=<?php echo $row['studentid']?> >Done</button>
                </div>
            </form>
             </div>
            </div>
        </div>
        <?php
        }
        if(isset($_POST['edit_submit']))
        {
            $xx=$_POST['edit_submit'];
            $fname=$_POST['fname'];
            $lname=$_POST['lname'];
            $s_n=$_POST['school_name'];
            $sub=$_POST['subject'];
            //echo "<script>alert('$fname');</script>";
            $q="UPDATE `student` SET `fname`='$fname',`lname`='$lname',`school_name`='$s_n',`subject`='$sub' WHERE studentid='$xx';";
            mysqli_query($con,$q);
        }
        ?>
    </div>    


	  <!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->

    </div>
    <!-- End container-fluid-->
    <script>
        function fun()
        {
            document.getElementById('form').style.display="block";
        }
        function fun2()
        {
            document.getElementById('form').style.display="none";
        }
    </script>
  <?php
    if(isset($_POST['accept']))
    {
        //echo "<script>alert('$num');</script>";
        $x=$_POST['accept'];
        $q="UPDATE `student` SET `aproval`='Given',`done_by`='$fun' WHERE studentid='$x'";
        mysqli_query($con,$q);
    }
    if(isset($_POST['reject']))
    {
        $x=$_POST['reject'];
        $q="DELETE FROM `student` WHERE studentid='$x';";
        mysqli_query($con,$q);
    }
    if(isset($_POST['Block']))
    {
        $x=$_POST['Block'];
        $q="UPDATE `student` SET `aproval`='Block',`done_by`='$fun' WHERE studentid='$x';";
        mysqli_query($con,$q);
    }
    if(isset($_POST['unblock']))
    {
        $x=$_POST['unblock'];
        //echo "<script>alert('$x');</script>";
        $q="UPDATE `student` SET `aproval`='Given',`done_by`='$fun' WHERE studentid='$x';";
        mysqli_query($con,$q);
    }
  ?>

  <?php
    include "end.php";
  ?>