<?php
    include 'connect.php';

    $con = mysqli_connect($server,$username,$passwd,$database); 

    if(!$con){
       echo 'Not Connected to Server';
    }

    $user_id = $_POST['user_id'];

    $sql = "UPDATE user_accounts SET is_active = true WHERE user_id = $user_id";
    $result = mysqli_query($con, $sql);

    echo json_encode(["message" => "Success"]);
?>