<?php
$outArray = [];
include 'connect.php';

$con = mysqli_connect($server, $username, $passwd, $database);

if (!$con) {
    echo 'Not Connected to Server';
}

$user_id = $_POST['user_id'];

$sql = "Select mc.name as 'name', mc.address as 'address' , mc.specialization as 'specialist'
, DATE(ua.created_on) as 'date', DATE_FORMAT(ua.created_on, '%k:%i') as 'time' 
from user_appointments ua join master_clinics mc on ua.clinic_code = mc.clinic_code WHERE ua.user_id='$user_id'";

$result = mysqli_query($con, $sql);
if ($result) {
    while ($row = mysqli_fetch_all($result, MYSQLI_ASSOC)) $outArray = $row;
}

echo json_encode(["message" => $outArray]);

?>
