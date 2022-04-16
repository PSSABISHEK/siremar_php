<?php
    include 'connect.php';

    $con = mysqli_connect($server,$username,$passwd,$database); 
 
    if(!$con){
        echo 'Not Connected to Server';
    }

    $airline_name = $_POST['airline_name'];
    $flight_no = $_POST['flight_no'];
    $departure_time = $_POST['departure_time'];

    $sql = "INSERT INTO flights ( airline_name, flight_no, departure ) VALUES ('$airline_name', '$flight_no', '$departure_time')";

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo json_encode(["message" => "Success"]);
    } else {
        echo json_encode(["message" => "Error"]);
    }
    
?>
