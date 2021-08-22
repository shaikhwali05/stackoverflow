<?php
if(isset($_POST['submit'])){
    include '_dbconnect.php';
    $useremail = $_POST['loginemail'];
    $pass = $_POST['loginpassword'];
    
    $sql = "SELECT * FROM `users` WHERE user_email = `$useremail`";
    $result = mysqli_query($conn , $sql);
    $num = mysqli_num_rows($result);
    if($num==1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($pass , $row['user_pass'])){
            echo 'hello You Loggedin';
        }
        else{
            echo 'Sorry invalid credentials';

        }

    }
}

?>