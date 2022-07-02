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


    <div class="content-wrapper">
        <div class="container-fluid">
 
        <div class="row mt-3" style="display:block" id="xyz">
      <div class="col-lg-10">
         <div class="card">
           <div class="card-body">
           <div class="card-title">Test</div>
            <hr>
                <h3>Create Test&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn btn-light px-5" onclick="window.location.href='add_test.php'">Enter</button>
                 </h3>
                 <hr><br>
<!--                <h3>Modify Test&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <button class="btn btn-light px-5"  onclick="window.location.href='show_test.php'">Enter</button>
                </h3>-->
             </div>

            </div>
        </div>
    </div>


    <div class="row">
        <?php
            $q="select * from test";
            $result=mysqli_query($con,$q);
            $nums=mysqli_num_rows($result);
        ?>
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Test Manage</h5>
			  <div class="table-responsive">
               <table class="table table-striped" style="text-align:center;">
                  <thead>
                    <tr>
                      <th scope="col">Test Name</th>
                      <th scope="col">Test Type</th>
                      <th scope="col">Date</th>
                      <th scope="col">View</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                        $s="SELECT * FROM `test` where create_by='$fun'";
                        $result=mysqli_query($con,$s);
                        $num=mysqli_num_rows($result);
                        for($i=0;$i<$num;$i++)
                        {
                            $row=mysqli_fetch_array($result);
                            //echo $row['test_name'];
                            if($row['type']=='mock_test')
                                $hi="Mock Test";
                            else
                                $hi="Test";
                  ?>
                    <tr>
                      <td><?php echo $row['test_name']?></td>
                      <td><?php echo $hi?></td>
                      <td><?php echo $row['test_date']?></td>
                      <td>
                      <form method="get">
                        <pre><button type="submit" class="btn btn-warning" name="view" value="<?php echo $row['test_id']?>" style="font-size:15px;padding:5px;padding-left:10px;padding-right:10px;font-weight:bold;">View</button>   <button type="submit" class="btn btn-success" name="modify" style="font-size:15px;padding:5px;padding-left:10px;padding-right:10px;font-weight:bold;" value="<?php echo $row['test_id']?>">Modify</button></pre>
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
    


    </div>
    </div>
  <?php
    include "end.php";
  ?>

  <?php
    if(isset($_GET['view']))
    {
        $id=$_GET['view'];
        $q="select * from test where test_id='$id';";
        $result=mysqli_query($con,$q);
        $row=mysqli_fetch_array($result);
        $_SESSION['test_name']=$row['test_name'];
        echo "<script>window.location.href='view_test.php';</script>";
    }
    if(isset($_GET['modify']))
    {
        $id=$_GET['modify'];
        $_SESSION['modify']=$id;
        echo "<script>window.location.href='modify_test.php';</script>";
    }
  ?>