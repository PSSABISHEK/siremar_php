<?php
    include 'connect.php';

    $con = mysqli_connect($server,$username,$passwd,$database); 
 
    if(!$con){
        echo 'Not Connected to Server';
    }

    $user_id = $_POST['user_id'];

    $sql = "SELECT name, date, time, address FROM event_bookings JOIN event_list el ON el.event_id=event_bookings.event_id and event_bookings.user_id='$user_id'";

    $result = mysqli_query($con, $sql);
    if ($result) {
        while ($row = mysqli_fetch_all($result, MYSQLI_ASSOC)) $outArray = $row;
    }
    
    echo json_encode(["message"=>$outArray]);

?>