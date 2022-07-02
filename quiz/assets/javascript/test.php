<?php
    include "../student/db.php";
    session_start();
?>



<?php
    $x=$_SESSION['test_name'];
    $q="select * from $x";
    $result=mysqli_query($con,$q);
    $q="select * from test where test_name = '$x'";
    $test_name = mysqli_query($con, $q);
    $test_num=mysqli_num_rows($test_name);
    $num=mysqli_num_rows($result);
    // echo "<script>alert('$num');</script>";

    if($test_num == 0 || $num == 0) {
        echo "<script>window.close();</script>";
    }
    $data = [];
    $response = [];

    $test_row = mysqli_fetch_assoc($test_name);

    $response['detail'] = $test_row;

    while($row=mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    
    $response['data'] =  $data;

    $json = json_encode($response);
    $bytes = file_put_contents("../quiz/assets/javascript/questions.json", $json);


?>