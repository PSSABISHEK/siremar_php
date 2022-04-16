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

    $id = $_POST['id'];
    $is_active = $_POST['is_active'];

    if ($id =='') {
        $sql = "INSERT INTO master_discount (`name`,
        `events_rate`,
        `ferrys_rate`,
        `flights_rate`,
        `clinics_rate`,
        `schools_rate`, `is_active`) VALUE ('$discount_code', '$events_rate', '$ferry_rate', '$flight_rate',
        '$clinic_rate', '$school_rate', 0)";
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo json_encode(["message" => "Added Discount Successfully"]);
        } else {
            echo json_encode(["message" => "Error adding Discount"]);
        }
    } else {
        $sql = "UPDATE master_discount SET `name` = '$discount_code',
        `events_rate` = '$events_rate',
        `ferrys_rate` = '$ferry_rate',
        `flights_rate` = '$flight_rate',
        `clinics_rate` = '$clinic_rate',
        `schools_rate` = '$school_rate',
        `is_active` = '$is_active' WHERE master_discount.id = '$id'";
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo json_encode(["message" => "Updated Discount Successfully"]);
        } else {
            echo json_encode(["message" => "Error updating Discount"]);
        }
    }

?>
