<?php
    include 'connect.php';

    $con = mysqli_connect($server,$username,$passwd,$database); 
 
    if(!$con){
        echo 'Not Connected to Server';
    }

    $user_id = $_POST['user_id'];
    $transport_id = $_POST['transport_id'];
    $transport_type = $_POST['transport_type']; //FLIGHT OR FERRY
    $source = $_POST['source'];
    $destination = $_POST['destination'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $sql = "INSERT INTO transport_bookings (user_id, transport_id, type, source, destination, date, time)
        VALUES ('$user_id', '$transport_id', '$transport_type', '$source', '$destination', '$date', '$time')";

    $result = mysqli_query($con, $sql);
    if ($result) {
        echo json_encode(["message" => "Success"]);
    } else {
        echo json_encode(mysqli_error($con));
    }

?>