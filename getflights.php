<!--Sivaraman, Vighnesh (1001878596)
Pichaipillai, Abishek(1001842007)-->
<?php
    include 'connect.php';

    $con = mysqli_connect($server,$username,$passwd,$database); 
 
    if(!$con){
        echo 'Not Connected to Server';
    }

    $sql = "SELECT airline_name, flight_no, departure FROM flights WHERE is_active=1";

    // $result = mysqli_query($con, $sql);

    // $details = mysqli_fetch_all ($result, MYSQLI_ASSOC);
    // echo json_encode(["message"=>$details]);
    $result = mysqli_query($con, $sql);
    if ($result) {
        while ($row = mysqli_fetch_all($result, MYSQLI_ASSOC)) $outArray = $row;
      }
    // $details = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    echo json_encode(["message"=>$outArray]);
?>