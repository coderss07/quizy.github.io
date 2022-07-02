<?php
    session_start();
    if($_SESSION['user']=='')
        die("<script>window.location = 'index.php';</script>");
    $fun=$_SESSION['user'];
    $fun2=$_SESSION['name'];
    //echo "<script>alert('$fun2');</script>";
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
        

    <div class="row mt-3" style="display:block" id="xyz">
      <div class="col-lg-10">
         <div class="card">
           <div class="card-body">
           <div class="card-title">Announcement</div>
            <hr>
                <h2> Any Announcement ?</h2>
                 <button class="btn btn-light px-5" onclick="fun1()" name="procced">Enter</button>
             </div>
            </div>
        </div>
    </div>
    
    
    <div class="row mt-3" id="form" style="display:none">
      <div class="col-lg-10">
         <div class="card">
           <div class="card-body">
           <div class="card-title">Announcement</div>
            <hr>
            <form method="post">
                <div class="form-group">
                    <label for="input-1">Done By:<?php echo $fun2?></label>
                </div>
                <div class="form-group">
                    <label for="input-3">Subject</label>
                    <input type="text" class="form-control" id="input-3" placeholder="Enter Announcement Subject" required name="in_sub">
                </div>
                <div class="form-group">
                    <label for="input-2">Announcement</label>
                    <input type="text" class="form-control" id="input-3" placeholder="Enter Announcement" required name="in_ann">
                </div>
                <div class="form-group">
                <button class="btn btn-light px-5" onclick="fun()" name="back">Back</button>
                    <button type="submit" name="submit" value="submit" class="btn btn-light px-5">Done</button>
                </div>
            </form>
             </div>
            </div>
        </div>
    </div>

    
    <div class="row">
        <?php
            $q="select * from annoucement";
            $result=mysqli_query($con,$q);
            $nums=mysqli_num_rows($result);
        ?>
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Announcements</h5>
			  <div class="table-responsive">
               <table class="table table-striped" style="text-align:center;">
                  <thead>
                    <tr>
                      <th scope="col">SNo.</th>
                      <th scope="col">Teacher Name</th>
                      <th scope="col">Date</th>
                      <th scope="col">Time</th>
                      <th scope="col">Subject</th>
                      <th scope="col">View</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    for($i=0;$i<$nums;$i++)
                    {
                        $row=mysqli_fetch_array($result);
                  ?>
                    <tr>
                      <th scope="row"><?php echo $row['id']?></th>
                      <td><?php echo $row['done_by']?></td>
                      <td><?php echo $row['a_date']?></td>
                      <td><?php echo $row['a_time']?></td>
                      <td><?php echo $row['subject']?></td>
                      <td>
                      <form method="get">
                        <button type="submit" class="btn btn-warning" name="view" value=<?php echo $row['id']?> style="font-size:15px;padding:5px;padding-left:10px;padding-right:10px;font-weight:bold;">View</button>
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


        
    <div class="row mt-3" id="xxx" style="display:none">

    <?php
    if(isset($_GET['view']))
    {
        echo "<script>document.getElementById('xxx').style.display='block';</script>";
        $x=$_GET['view'];
        $q="select * from annoucement where id=$x";
        $result=mysqli_query($con,$q);
        $val=mysqli_fetch_array($result);
    }
  ?>
      <div class="col-lg-10" id="show">
         <div class="card">
           <div class="card-body">
           <div class="card-title">Announcement</div>
            <hr>
            <div class="form-group">
                    <label for="input-2">Name: <?php echo $val['done_by']?></label>
                </div>
            
            <div class="form-group">
                    <label for="input-2">Subject: <?php echo $val['subject']?></label>
                </div>
            <div class="form-group">
                   <pre><label for="input-2">Date: <?php echo $val['a_date']?></label>                                      <label for="input-2">Time: <?php echo $val['a_time']?></label></pre>
                </div>
            <div class="form-group">
                <?php echo $val['announce']?>
                </div>
    <center><button type="submit" class="btn btn-success" onclick="fun3()" style="font-size:15px;padding:5px;padding-left:25px;padding-right:25px;font-weight:bold;">Close</button></center>
             </div>
            </div>
        </div>
    </div>


	  <!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->

    </div>
    <!-- End container-fluid-->
  
  <script>
  function fun()
  {
      document.getElementById('form').style.display="none";
      document.getElementById('xyz').style.display="block";
  }
  function fun1()
  {
    document.getElementById('xyz').style.display="none";
    document.getElementById('form').style.display="block";
  }
  function fun3()
  {
      document.getElementById('show').style.display="none";
  }
  </script>

    <?php
        if(isset($_POST['submit']))
        {
            $sub=$_POST['in_sub'];
            $ann=$_POST['in_ann'];
            $q="select * from annoucement";
            $result=mysqli_query($con,$q);
            $r=mysqli_num_rows($result)+1;
            $x="SET time_zone ='+05:30';";
            mysqli_query($con,$x);
            $q="insert into annoucement values('$r',curdate(),curtime(),'$fun2','$sub','$ann');";
            mysqli_query($con,$q);
        }
    ?>

  <?php
    include "end.php";
  ?>