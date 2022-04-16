<!--Sivaraman, Vighnesh (1001878596)
Pichaipillai, Abishek(1001842007)-->
<?php
    include 'connect.php';

    $con = mysqli_connect($server,$username,$passwd,$database); 
 
    if(!$con){
        echo 'Not Connected to Server';
    }

    $sql = "Select fname, lname, birth_place, address, apt_no, move_outs.created_on, comments, user_role, is_approved
    from move_outs join user_accounts ua on ua.user_id = move_outs.user_id";

    $result = mysqli_query($con, $sql);
    if ($result) {
        while ($row = mysqli_fetch_all($result, MYSQLI_ASSOC)) $outArray = $row;
    }
    
    echo json_encode(["message"=>$outArray]);
?>