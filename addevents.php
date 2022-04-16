<!--Sivaraman, Vighnesh (1001878596)
Pichaipillai, Abishek(1001842007)-->
<?php
    include 'connect.php';

    $con = mysqli_connect($server,$username,$passwd,$database); 
 
    if(!$con){
        echo 'Not Connected to Server';
    }

    $event_id = $_POST['event_id'];
    $event_name = $_POST['event_name'];
    $date = $_POST['date'];
    $discount_rate = $_POST['discount_rate'];
    $address = $_POST['address'];
    $time = $_POST['time'];

    $sql = "INSERT INTO event_list (event_id, name, address, time, date, discount_rate)
    VALUE ('$event_id', '$event_name', '$address', '$time', '$date', '$discount_rate')";

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo json_encode(["message" => "Success"]);
    } else {
        echo json_encode(["message" => "Error"]);
    }
?>