<?php
    $outArray = [];
    include 'connect.php';

    $con = mysqli_connect($server,$username,$passwd,$database); 
 
    if(!$con){
        echo 'Not Connected to Server';
    }

    $sql = "SELECT * FROM user_accounts";

    // $result = mysqli_query($con, $sql);

    // $details = mysqli_fetch_all ($result, MYSQLI_ASSOC);
    // echo json_encode(["message"=>$details]);
    $result = mysqli_query($con, $sql);
    if ($result) {
        while ($row = mysqli_fetch_all($result, MYSQLI_ASSOC)) $outArray = $row;
      }
    // $details = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    echo json_encode(["message"=>$outArray]);
?>