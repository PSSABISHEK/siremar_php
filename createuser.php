<!--Sivaraman, Vighnesh (1001878596)
Pichaipillai, Abishek(1001842007)-->
<?php
    include 'connect.php';

   $con = mysqli_connect($server,$username,$passwd,$database); 

   if(!$con){
       echo 'Not Connected to Server';
   }

   $user_id = $_POST['user_id'];
   $email = $_POST['email_id'];
   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $birth_place = $_POST['birth_place'];
   $dob = $_POST['dob'];
   $address = $_POST['address'];
   $apt_no = $_POST['apt_no'];
   $pwd = $_POST['pwd'];
   $proof_url = $_POST['proof_url'];
   $user_role = $_POST['user_role'];

   $sql = "SELECT email from user_accounts where user_id = '$user_id' and user_role = '$user_role'";
   $result = mysqli_query($con, $sql);

   if(mysqli_num_rows($result) == 0) {
        $sql = "INSERT into user_accounts (user_id, email, fname, lname, birth_place, dob, address, apt_no, pwd, proof_url, user_role)
        VALUES ('$user_id','$email','$fname', '$lname', '$birth_place', '$dob','$address', '$apt_no','$pwd', '$proof_url', '$user_role')";
        $result = mysqli_query($con, $sql);
        // echo mysqli_error($con);
        echo json_encode(["message" => "Success"]);
   } else {
        echo json_encode(["message" => "User already exists"]);    
   }
   
?> 