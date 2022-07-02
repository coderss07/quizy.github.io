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
            $q="select * from test";
            $result=mysqli_query($con,$q);
            $num=mysqli_num_rows($result);
        ?>
      <div class="row">
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Test Details</h5>
			  <div class="table-responsive">
               <table class="table table-striped" style="text-align:center;">
                  <thead>
                    <tr>
                      <th scope="col">Test Name</th>
                      <th scope="col">Create By</th>
                      <th scope="col">Type</th>
                      <th scope="col">Date</th>
                      <th scope="col">Start Time</th>
                      <th scope="col">End Time</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        for($i=0;$i<$num;$i++)
                        {
                            $row=mysqli_fetch_array($result);
                    ?>
                    <tr>
                      <th scope="row"><?php echo $row['test_name']?></th>
                      <td><?php echo $row['create_by']." ".$row['lname']?></td>
                    <?php
                      $x=$row['type'];
                      if($x=='mock_test')
                        $x="Mock Test";
                    ?>
                      <td><?php echo $x?></td>
                      <td><?php echo $row['test_date']?></td>
                      <td><?php echo $row['s_time']?></td>
                      <td><?php echo $row['e_time']?></td>
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
                      <th scope="col">Student Id</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">School</th>
                      <th scope="col">Subject</th>   
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
                      <td><?php echo $row['email']?></td>
                      <td><?php echo $row['school_name']?></td>
                      <td><?php echo $row['subject']?></td>
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
           $q="select * from teacher where aproval='Given'";
           $result=mysqli_query($con,$q);
           $num=mysqli_num_rows($result);
        ?>
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Teachers Details</h5>
			  <div class="table-responsive">
               <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Teacher Id</th>
                      <th scope="col">Teacher Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">School</th>
                      <th scope="col">Subject</th>
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
                      <th scope="row"><?php echo $row['teacherid']?></th>
                      <td><?php echo $row['fname'].' '.$row['lname']?></td>
                      <td><?php echo $row['email']?></td>
                      <td><?php echo $row['school']?></td>
                      <td><?php echo $row['subject']?></td>
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
        ?>
    </div>    


	  <!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->

    </div>
    <!-- End container-fluid-->

  <?php
    include "end.php";
  ?>