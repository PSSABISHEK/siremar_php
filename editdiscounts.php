<?php
    include 'connect.php';

    $con = mysqli_connect($server,$username,$passwd,$database); 
 
    if(!$con){
        echo 'Not Connected to Server';
    }

    $discount_code = $_POST['discount_code'];
    $events_rate = $_POST['events_rate'];
    $ferry_rate = $_POST['ferry_rate'];
    $ferry_rate = $_POST['flight_rate'];
    $clinic_rate = $_POST['clinic_rate'];
    $school_rate = $_POST['school_rate'];
    $discount_id = $_POST['discount_id'];

    $sql = "UPDATE master_discount SET
    (`name` = '$discount_code',
    `events_rate` = '$events_rate,
    `ferrys_rate` = '$ferry_rate',
    `flights_rate` = '$ferry_rate',
    `clinics_rate` = '$clinic_rate',
    `schools_rate` = '$school_rate') WHERE id = $discount_id";

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo json_encode(["message" => "Success"]);
    } else {
        echo json_encode(["message" => "Error"]);
    }

?>