<?php
    include 'connect.php';

    $con = mysqli_connect($server,$username,$passwd,$database); 
 
    if(!$con){
        echo 'Not Connected to Server';
    }
    
    $dicount_id = $_POST['dicount_id'];

    $sql = "DELETE FROM master_discount WHERE id='$discount_id'";

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo json_encode(["message" => "Success"]);
    } else {
        echo json_encode(["message" => "Error"]);
    }

?>