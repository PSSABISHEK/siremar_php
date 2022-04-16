<?php
    $outArray = [];
    include 'connect.php';

    $con = mysqli_connect($server,$username,$passwd,$database); 
 
    if(!$con){
        echo 'Not Connected to Server';
    }

    $user_id = $_POST['user_id'];

    $sql = "Select move_outs.id, fname, lname, birth_place, address, apt_no, move_outs.created_on, comments, user_role, is_approved
    from move_outs join user_accounts ua on ua.user_id = move_outs.user_id";
    if ($user_id != ''){
        $sql .= "where ua.user_id = '$user_id'";
    }

    $result = mysqli_query($con, $sql);
    if ($result) {
        while ($row = mysqli_fetch_all($result, MYSQLI_ASSOC)) $outArray = $row;
    }
    
    echo json_encode(["message"=>$outArray]);
?>