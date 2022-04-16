<?php
    include 'connect.php';

    $con = mysqli_connect($server,$username,$passwd,$database); 
 
    if(!$con){
        echo 'Not Connected to Server';
    }

    $id = $_POST['id'];

    $sql = "UPDATE move_outs SET is_approved=1 WHERE id='$id'";

    $result = mysqli_query($con, $sql);
    if ($result) {
        echo json_encode(["message" => "Success"]);
    } else {
        echo json_encode(mysqli_error($con));
    }
?>