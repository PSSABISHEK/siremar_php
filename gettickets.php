<?php
    include 'connect.php';

    $con = mysqli_connect($server,$username,$passwd,$database); 
 
    if(!$con){
        echo 'Not Connected to Server';
    }

    $transport_type = $_POST['transport_type']; //FLIGHT OR FERRY
    $user_id = $_POST['user_id'];

    $sql = "SELECT source, destination, date, time FROM transport_bookings WHERE user_id='$user_id' and type='$transport_type'";
    
    $result = mysqli_query($con, $sql);
    if ($result) {
        while ($row = mysqli_fetch_all($result, MYSQLI_ASSOC)) $outArray = $row;
    }
    
    echo json_encode(["message"=>$outArray]);

?>
