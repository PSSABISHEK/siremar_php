<!--Sivaraman, Vighnesh (1001878596)
Pichaipillai, Abishek(1001842007)-->
<?php
    include 'connect.php';

    $con = mysqli_connect($server,$username,$passwd,$database); 
 
    if(!$con){
        echo 'Not Connected to Server';
    }

    $user_id = $_POST['user_id'];
    $reason = $_POST['reason'];
    $moveout_date = $_POST['moveout_date'];
    
    $sql = "INSERT INTO move_outs (user_id, comments, date) VALUES
    ('$user_id', '$reason', '$moveout_date')";

    $result = mysqli_query($con, $sql);
    if ($result) {
        echo json_encode(["message" => "Success"]);
    } else {
        echo json_encode(mysqli_error($con));
    }

?>