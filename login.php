<!--Sivaraman, Vighnesh (1001878596)
Pichaipillai, Abishek(1001842007)-->
<?php
    session_start();
    include 'connect.php';

    $con = mysqli_connect($server,$username,$passwd,$database); 

    if(!$con){
       echo 'Not Connected to Server';
    }
    if(isset($_POST['user_id']) && isset($_POST['password'])){
            $User_id = $_POST['user_id'];
            $Password = $_POST['password'];
            $User_role = $_POST['user_role'];
            
            $sql = "Select user_id, user_role, pwd from user_accounts where user_id = '$User_id' AND user_role = '$User_role'";
            $result = mysqli_query($con, $sql);
            
            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result);

                if($Password = $row['pwd']){
                    if($User_role == 'U101'){
                        $_SESSION['Role'] = "Admin";
                    }
                    if($User_role == 'I101'){
                        $_SESSION['Role'] = "Inspector";
                    }
                    if($User_role == 'A101'){
                        $_SESSION['Role'] = "Admin";
                    }
                    $_SESSION['user_id'] = $User_id;
                    echo json_encode(["user_id" => $User_id, "message" => "Success"]);
                }
                else{
                    echo "You have entered an incorrect password. Please try again";
                }
            }
            else{
                echo "There is not account with this user id. Please resgister/Sign up";
                
            }
    }
    else{
        echo "Please enter both email id and password";
    }

    mysqli_close($con);
?>