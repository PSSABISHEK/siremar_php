<?php
    include 'connect.php';

    $con = mysqli_connect($server,$username,$passwd,$database); 
 
    if(!$con){
        echo 'Not Connected to Server';
    }

    $sql = "SELECT * FROM master_discount";

    $result = mysqli_query($con, $sql);
    if ($result) {
        while ($row = mysqli_fetch_all($result, MYSQLI_ASSOC)) $outArray = $row;
      }
    // $details = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    echo json_encode(["message"=>$outArray]);

?>