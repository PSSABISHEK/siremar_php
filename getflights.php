<?php
    include 'connect.php';

    $con = mysqli_connect($server,$username,$passwd,$database); 
 
    if(!$con){
        echo 'Not Connected to Server';
    }

    $sql = "SELECT airline_name, flight_no, departure FROM flights WHERE is_active=1";

    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    $details = mysqli_fetch_all ($result, MYSQLI_ASSOC);
    echo json_encode($details);
    
?>