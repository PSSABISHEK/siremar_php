<!--Sivaraman, Vighnesh (1001878596)
Pichaipillai, Abishek(1001842007)-->
<?php
    include 'connect.php';

    $con = mysqli_connect($server,$username,$passwd,$database); 
 
    if(!$con){
        echo 'Not Connected to Server';
    }

    $user_id = $_POST['user_id'];
    $event_id = $_POST['event_id'];

    $sql = "INSERT INTO event_bookings (user_id, event_id)
    VALUE ('$user_id', '$event_id')";

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo json_encode(["message" => "Success"]);
    } else {
        echo json_encode(["message" => "Error"]);
    }
?>