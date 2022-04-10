<?php
    include 'connect.php';

    $con = mysqli_connect($server,$username,$passwd,$database); 
 
    if(!$con){
        echo 'Not Connected to Server';
    }
 
    $coupon_name = $_POST['coupon_name'];
    $business_type = $_POST['business_type'];

    $sql = "SELECT * from master_discount where name='$coupon_name' and is_active=1";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
		if(isset($row)) 
		{
            if ($business_type == 'events'){
                $details = array('events_rate'=>$row['events_rate']);
                $jsonstring = json_encode($details);
                echo $jsonstring;
            } else if ($business_type == 'ferrys') {
                $details = array('ferrys_rate'=>$row['ferrys_rate']);
                $jsonstring = json_encode($details);
                echo $jsonstring;
            } else if ($business_type == 'flights') {
                $details = array('flights_rate'=>$row['flights_rate']);
                $jsonstring = json_encode($details);
                echo $jsonstring;
            } else if ($business_type == 'clinics') {
                $details = array('clinics_rate'=>$row['clinics_rate']);
                $jsonstring = json_encode($details);
                echo $jsonstring;
            } else if ($business_type == 'schools') {
                $details = array('schools_rate'=>$row['schools_rate']);
                $jsonstring = json_encode($details);
                echo $jsonstring;
            }
		}
		else 
		{
			echo json_encode(["message" => "Coupon Invalid"]);
		}


?>