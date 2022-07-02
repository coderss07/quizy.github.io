<?php
    include "top.php";
    include "header.php";
    include "section.php";
?>

<?php
    $q="SELECT * FROM `test` where type='Test' and test_date=CURDATE()+1";
    $result=mysqli_query($con,$q);
    $num=mysqli_num_rows($result);
    //echo "<script>alert('$num');</script>";
?>
	<main id="main">
		<section class="services inner-page">
			<div class="container">
                    

            <div class="row">
        <div class="col-lg-14">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Test</h5>
			  <div class="table-responsive">
               <table class="table table-striped" style="text-align:center;">
                  <thead>
                    <tr>
                      <th scope="col">SNo.</th>
                      <th scope="col">Test Name</th>
                      <th scope="col">Date</th>
                      <th scope="col">Start Timming</th>
                      <th scope="col">End Timming</th>
                      <th scope="col">Start</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    for($i=0;$i<$num;$i++)
                    {
                        $row=mysqli_fetch_array($result);
                  ?>
                    <tr>
                      <th scope="row"><?php echo $i+1?></th>
                      <td><?php echo $row['test_name']?></td>
                      <td><?php echo $row['test_date']?></td>
                      <td><?php echo $row['s_time']?></td>
                      <td><?php echo $row['e_time']?></td>
                      <td>
                      <form method="GET">
                        <pre><button type="submit" class="btn btn-success" style="font-size:15px;padding-left:15px;padding-right:15px;font-weight:bold;" name="Start" value=<?php echo $row['test_name']?>>Start</button></pre>
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

    <br><br>

    <?php
    $q="SELECT * FROM `test` where type='Test' and test_date!=CURDATE()+1";
    $result=mysqli_query($con,$q);
    $num=mysqli_num_rows($result);
    ?>
    <div class="row">
        <div class="col-lg-14">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Upcoming Test</h5>
			  <div class="table-responsive">
               <table class="table table-striped" style="text-align:center;">
                  <thead>
                    <tr>
                      <th scope="col">SNo.</th>
                      <th scope="col">Test Name</th>
                      <th scope="col">Date</th>
                      <th scope="col">Start Timming</th>
                      <th scope="col">End Timming</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    for($i=0;$i<$num;$i++)
                    {
                        $row=mysqli_fetch_array($result);
                  ?>
                    <tr>
                      <th scope="row"><?php echo $i+1?></th>
                      <td><?php echo $row['test_name']?></td>
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



			</div>
		</section>

	</main><!-- End #main -->

    <?php
        include "footer.php";
        include "end.php";
    ?>
    <?php
        if(isset($_GET['Start']))
        {
            $_SESSION['test_name']=$_GET['Start'];
            echo "<script>window.location.href='take-test.php'</script>";
        }
    ?>