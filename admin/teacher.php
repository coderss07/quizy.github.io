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
    ?>
<div class="clearfix"></div>
	
<div class="content-wrapper">
    <div class="container-fluid">

    <?php
        $q="select * from teacher where aproval='Not Given';";
        $result=mysqli_query($con,$q);
        $nums=mysqli_num_rows($result);
    ?>
      <div class="row">
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Teacher Request</h5>
			  <div class="table-responsive">
               <table class="table table-striped" style="text-align:center;">
                  <thead>
                    <tr>
                      <th scope="col">S.No</th>
                      <th scope="col">Name</th>
                      <th scope="col">Subject</th>
                      <th scope="col">Username</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    for($i=0;$i<$nums;$i++)
                    {
                        $row=mysqli_fetch_array($result);
                  ?>
                    <tr>
                      <th scope="row"><?php echo $i+1?></th>
                      <td><?php echo $row['fname']." ".$row['lname']?></td>
                      <td><?php echo $row['subject']?></td>
                      <td><?php echo $row['email']?></td>
                      <td>
                      <!--  <pre><input type="submit" value="Accept" class="btn btn-success" style="color:white;font-size:12px">   <input type="submit" value="Reject" class="btn btn-danger" id="y"></pre> -->
                      <form method="get">
                        <pre><button type="submit" class="btn btn-success" style="font-size:15px;padding:5px;font-weight:bold;" name="accept" value=<?php echo $row['teacherid']?> >Accept</button>  <button type="submit" class="btn btn-danger" style="font-size:15px;padding:5px;font-weight:bold;" name="reject" value=<?php echo $row['teacherid']?>>Reject</button></pre>
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


    <?php
        $q="select * from teacher where aproval='Given';";
        $result=mysqli_query($con,$q);
        $nums=mysqli_num_rows($result);
    ?>

      <div class="row">
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Teachers Details</h5>
			  <div class="table-responsive">
               <table class="table table-striped" style="text-align:center;">
                  <thead>
                    <tr>
                      <th scope="col">SNo.</th>
                      <th scope="col">Name</th>
                      <th scope="col">Username</th>
                      <th scope="col">Subject</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    for($i=0;$i<$nums;$i++)
                    {
                        $row=mysqli_fetch_array($result);
                  ?>
                    <tr>
                      <th scope="row"><?php echo $row['teacherid']?></th>
                      <td><?php echo $row['fname']." ".$row['lname']?></td>
                      <td><?php echo $row['email']?></td>
                      <td><?php echo $row['subject']?></td>
                      <td>
                      <form method="GET">
                        <pre><button type="submit" class="btn btn-warning" style="font-size:15px;padding:5px;font-weight:bold;" name="edit" value=<?php echo $row['teacherid']?>>Edit</button></pre>
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
            //echo "<script><script>";
            if(isset($_GET['edit']))
            {
                $xx=$_GET['edit'];
                echo "<script>document.getElementById('form').style.display='block';</script>";
                $q="select * from teacher where $xx=teacherid;";
                $result=mysqli_query($con,$q);
                $row=mysqli_fetch_array($result);
            }
        ?>
      <div class="col-lg-10">
         <div class="card">
           <div class="card-body">
           <div class="card-title">Teachers Details Edit</div>
            <hr>
            <form method="post">
                <div class="form-group">
                    <label for="input-1">User Name:<?php echo $row['email']?></label>
                </div>
                <div class="form-group">
                    <label for="input-3">Fname</label>
                    <input type="text" class="form-control" id="input-3" name="fname" value=<?php echo $row['fname']?>>
                </div>
                <div class="form-group">
                    <label for="input-2">Lname</label>
                    <input type="text" class="form-control" id="input-3" name="lname" value=<?php echo $row['lname']?>>
                </div>
                
                <div class="form-group">
                    <label for="input-2">School</label>
                    <input type="text" class="form-control" id="input-3" name="school" value="<?php echo $row['school']?>">
                </div>
                <div class="form-group">
                    <label for="input-2">Subject</label>
                    <input type="text" class="form-control" id="input-3"  name="subject" value=<?php echo $row['subject']?>>
                </div>
                <div class="form-group">
                <button class="btn btn-light px-5" onclick="fun2()" name="back">Back</button>
                    <button type="submit" name="edit_submit" value=<?php echo $row['teacherid']?> class="btn btn-light px-5">Done</button>
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
        if(isset($_GET['edit']))
        {
            $v=$_GET['edit'];
            $q="select * from teacher where teacherid='$v'";
            $result=mysqli_query($con,$q);
            $row=mysqli_fetch_array($result);
        }
        if(isset($_POST['edit_submit']))
        {
            $xx=$_POST['edit_submit'];
            echo "<script>alert('$xx');</script>";
            $fname=$_POST['fname'];
            $lname=$_POST['lname'];
            $subject=$_POST['subject'];
            $school=$_POST['school'];
            //echo "xyz";
            //echo "<script>alert('ama');</script>";
            $q="update teacher set fname='$fname',lname='$lname',subject='$subject',school='$school' where teacherid='$xx'";
            mysqli_query($con,$q);
        }
    ?>
<script>
    /*function fun()
    {
        document.getElementById('form').style.display='block';
    }*/
    function fun2()
    {
        //alert('aman');
        document.getElementById('form').style.display='none';
    }
</script>
<?php
    if(isset($_GET['accept']))
    {
        echo "<script>alert('Teacher is Accepted');</script>";
        $v=$_GET['accept'];
        $q="update teacher set aproval='Given' where teacherid='$v';";
        mysqli_query($con,$q);
    }
    if(isset($_GET['reject']))
    {
        echo "<script>alert('Teacher is Rejected');</script>";
        $v=$_GET['reject'];
        $q="delete from teacher where teacherid='$v'";
        mysqli_query($con,$q);
    }
?>

  <?php
    include "end.php";
  ?>