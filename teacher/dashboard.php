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

      


	  <!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->

    </div>
    <!-- End container-fluid-->


    <?php
        include "end.php";
    ?>
	
  