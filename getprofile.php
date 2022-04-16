<!--Sivaraman, Vighnesh (1001878596)
Pichaipillai, Abishek(1001842007)-->
<?php
    include 'connect.php';

    $con = mysqli_connect($server,$username,$passwd,$database); 
 
    if(!$con){
        echo 'Not Connected to Server';
    }

    $user_id = $_POST['user_id'];

    $sql = "SELECT * FROM user_accounts WHERE user_id='$user_id'";
    $result = mysqli_query($con, $sql);

    $row = mysqli_fetch_assoc($result);
		if(isset($row)) 
		{
			$details = array('fname'=>$row['fname'], 'lname'=>$row['lname'], 'birth_place'=>$row['birth_place'], 'dob'=>$row['dob'], 'address'=>$row['address'], 'apt_no'=>$row['apt_no'], 'email'=>$row['email']);
			$jsonstring = json_encode($details);
			echo $jsonstring;
		}
		else 
		{
			echo "No data available";
		}
?>