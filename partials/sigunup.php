<?php
if(isset($_POST['submit'])){
    include '_dbconnect.php';
    $useremail = $_POST['signupemail'];
    $pass = $_POST['signuppassword'];
    $cpass = $_POST['signupcpassword'];

    // checking whether this email exists or not
    $existsql = "SELECT * FROM `users` WHERE user_email = `$useremail`;";
    $result = mysqli_query($conn , $existsql);
    $num = mysqli_num_rows($result);
    if($num_R>0){
        $showError = 'Email is already verified';
    }
    else{
        if($pass ==$cpass){
            $hashpass = password_hash($pass , PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_email`, `user_pass`, `timestamp`) VALUES (`$useremail', '$hashpass', current_timestamp());
            ";
            $result = mysqli_query($conn , $sql);
            if($result){
                $showAlert = true;
                
            }
        }
        else{
            $showError = 'password does not match';
        }
    }



}
?>