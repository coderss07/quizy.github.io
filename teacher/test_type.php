<?php
    session_start();
    if($_SESSION['user']=='')
        die("<script>window.location = 'index.php';</script>");
    if($_SESSION['test_name']=='')
        die("<script>window.location='add_test.php';</script>");
?>

<?php
        include "begin.php";
        include "sidebar.php";
        include "topbar.php";
        include "db.php";
        $fun=$_SESSION['user'];
        $fun2=$_SESSION['name'];
        $tname=$_SESSION['test_name'];
    ?>


    <div class="content-wrapper">
        <div class="container-fluid">
 
        <div class="row mt-3" style="display:block" id="xyz">
      <div class="col-lg-10">
         <div class="card">
           <div class="card-body">
           <div class="card-title">Add Question</div>
            <hr>
                <h3>By Manually &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn btn-light px-5" id='Manually' name='Manually' value='Manually' onclick="next_page();">Enter</button>
                 </h3>
                 <hr><br>
                <h3>By Excel Sheet&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <button class="btn btn-light px-5"  onclick="xyz();">Enter</button>
                </h3>
             </div>

            </div>
        </div>
    </div>


    
    <div class="row mt-3" id="excel_form" style="display:none;">
      <div class="col-lg-10">
         <div class="card">
           <div class="card-body">
           <div class="card-title">Add Test By Excel</div>
            <hr>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="input-2">Each Question Score</label>
                    <input type="file" class="form-control" id="file" required name="file">
                </div>
                <div class="form-group">
                 <button type="submit" name="Submit" value="Submit" class="btn btn-light px-5">Done</button>
                </div>
            </form>
             </div>
            </div>
        </div>
    </div>
    

    <script>
        function xyz()
        {
            document.getElementById('excel_form').style.display='block';
        }
        function next_page()
        {
            window.location.href='add_question.php';
        }
    </script>

    </div>
    </div>
  
  
  <?php


require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');


if(isset($_POST['Submit'])){
    
    $path = $_FILES['file']['name'];
    //echo $path;
    $extension = pathinfo($path, PATHINFO_EXTENSION);
    //echo("The extension is $extension.");  
  if($extension=='xlsx'){

    $uploadFilePath = 'uploads/'.basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);
    

    $Reader = new SpreadsheetReader($uploadFilePath);
    
      $Reader->ChangeSheet(0);
      $x=0;
      foreach ($Reader as $Row)
      {
        $x++;
        $ques = isset($Row[0]) ? $Row[0] : '';
        $choice1 = isset($Row[1]) ? $Row[1] : '';
        $choice2 = isset($Row[2]) ? $Row[2] : '';
        $choice3 = isset($Row[3]) ? $Row[3] : '';
        $choice4 = isset($Row[4]) ? $Row[4] : '';
        $ans = isset($Row[5]) ? $Row[5] : '';
        //echo "<script>alert('$tname')</script>";
        //echo $ques." ".$choice1." ".$choice2." ".$choice3." ".$choice4." ".$ans."<br>";
        $query = "insert into `$tname` values($x,'$ques','$choice1','$choice2','$choice3','$choice4','$ans')";
        mysqli_query($con,$query);
       }
       echo "<script>alert('The Question paper is easily uploaded');window.location.href='test.php';</script>";

  }else { 
    die("<br/>Sorry, File type is not allowed. Only Excel file."); 
  }
}
?>

  
  <?php
    include "end.php";
  ?>

