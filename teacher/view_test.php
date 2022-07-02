<?php
    session_start();
    if($_SESSION['user']=='')
        die("<script>window.location = 'index.php';</script>");
    if($_SESSION['test_name']=='')
        die("<script>window.location='test.php';</script>");
    else
    {
        $test_name=$_SESSION['test_name'];
        //echo "<script>alert('$test_name');</script>";
    }
?>

<?php
        include "begin.php";
        include "sidebar.php";
        include "topbar.php";
        include "db.php";
        $fun=$_SESSION['user'];
        $fun2=$_SESSION['name'];
        //echo "<script>alert('$test_name');</script>";
    ?>


    <div class="clearfix"></div>
	
<div class="content-wrapper">
    <div class="container-fluid">


    
        <?php
            $q="select * from $test_name;";
            $result=mysqli_query($con,$q);
            $num=mysqli_num_rows($result);
        ?>
      <div class="row">
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
              <form method="post" action="add_question.php">
              <pre>
              <h5 class="card-title">Test Name : <?php echo $test_name ?>    <button type="submit" class="btn btn-light" style="font-size:20px;padding:10px;font-weight:bold;" name="add_ques" value="add_ques" > Add Question </button>
              </h5></pre>
              </form>
			  <div class="table-responsive">
               <table class="table table-striped" style="text-align:center;">
                  <thead>
                    <tr>
                      <th scope="col">Question</th>
                      <th scope="col">Option1</th>
                      <th scope="col">Option2</th>
                      <th scope="col">Option3</th>
                      <th scope="col">Option4</th>
                      <th scope="col">Correct ans</th>
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
                      <th scope="row"><?php echo $row['question']?></th>
                      <td><?php echo $row['choice1']?></td>
                      <td><?php echo $row['choice2']?></td>
                      <td><?php echo $row['choice3']?></td>
                      <td><?php echo $row['choice4']?></td>
                      <td><?php echo $row['correct']?></td>
                      <td>
                        <!--<pre><input type="submit" value="Accept" class="btn btn-success" style="color:white;font-size:12px">   <input type="submit" value="Reject" class="btn btn-danger" id="y"></pre> -->
                        <form method="get" action="modify_ques.php">
                        <pre><button type="submit" class="btn btn-success" style="font-size:15px;padding:5px;font-weight:bold;" name='edit' value="<?php echo $row['ques_no']?>"  >Edit</button></pre>
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


      
    
	  <!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->

    </div>
    <!-- End container-fluid-->
  

  
  <?php
    include "end.php";
  ?>

