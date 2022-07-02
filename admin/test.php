    <?php
    session_start();
    if($_SESSION['user']=='')
        die("<script>window.location = 'index.php';</script>");
?>
    <?php
        include "db.php";
        include "begin.php";
        include "sidebar.php";
        include "topbar.php";
    ?>


    <div class="content-wrapper">
    <div class="container-fluid">

    <?php
        $q="select * from test ;";
        $result=mysqli_query($con,$q);
        $nums=mysqli_num_rows($result);
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
                      <th scope="col">S.No</th>
                      <th scope="col">Test Name</th>
                      <th scope="col">Create By</th>
                      <th scope="col">Date</th>
                      <th scope="col">Duration</th>
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
                      <td><?php echo $row['test_name']?></td>
                      <td><?php echo $row['create_by']?></td>
                      <td><?php echo $row['test_date']?></td>
                      <td>
                      <?php echo $row['test_hrs']?> 
                      <!--
                      <form method="get">
                        <pre><button type="submit" class="btn btn-success" style="font-size:15px;padding:5px;font-weight:bold;" name="accept" value="<?php echo $row['test_name']?>" >Accept</button>  <button type="submit" class="btn btn-danger" style="font-size:15px;padding:5px;font-weight:bold;" name="reject" value="<?php echo $row['test_name']?>">Reject</button></pre>
                        </form>-->
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
    

	  <!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->

    </div>
    <!-- End container-fluid-->   


    <?php
        include "end.php";
    ?>
