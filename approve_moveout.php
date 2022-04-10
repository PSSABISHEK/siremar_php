<?php
    include 'connect.php';

    $con = mysqli_connect($server,$username,$passwd,$database); 
 
    if(!$con){
        echo 'Not Connected to Server';
    }

    $user_id = $_POST['user_id'];

    $sql = "UPDATE move_outs SET is_approved=1 WHERE user_id='$user_id'";

    $result = mysqli_query($con, $sql);
    if ($result) {
        echo json_encode(["message" => "Success"]);
    } else {
        echo json_encode(mysqli_error($con));
    }
?>