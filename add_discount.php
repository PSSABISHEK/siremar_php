<?php
    include 'connect.php';

    $con = mysqli_connect($server,$username,$passwd,$database); 
 
    if(!$con){
        echo 'Not Connected to Server';
    }

    $discount_code = $_POST['discount_code'];
    $events_rate = $_POST['events_rate'];
    $ferry_rate = $_POST['ferry_rate'];
    $flight_rate = $_POST['flight_rate'];
    $clinic_rate = $_POST['clinic_rate'];
    $school_rate = $_POST['school_rate'];

    $sql = "INSERT INTO master_discount (`name`,
    `events_rate`,
    `ferrys_rate`,
    `flights_rate`,
    `clinics_rate`,
    `schools_rate`) VALUE ('$discount_code', '$events_rate', '$ferry_rate', '$flight_rate',
    '$clinic_rate', '$school_rate')";

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo json_encode(["message" => "Success"]);
    } else {
        echo json_encode(["message" => "Error"]);
    }

?>
