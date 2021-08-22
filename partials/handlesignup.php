<?php

$showError = "false";
$showAlert = false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include "_dbconnect.php";
    $Username = $_POST['signupemail'];
    $password = $_POST['signuppassword'];
    $cpassword = $_POST['signupcpassword'];
    $existsql = "SELECT * FROM `users` WHERE 'user_email' = '$Username'";
    $result =  mysqli_query($conn , $existsql);
    $numexist = mysqli_num_rows($result);
    if($numexist>0){
      $showError = 'Email is already verified';

    }
    else{
    if($password == $cpassword){
      $hashpass = password_hash($password ,PASSWORD_DEFAULT);

        $sql = "INSERT INTO `users` (`sno`, `user_email`, `user_pass`, `timestamp`) VALUES (NULL, '$Username', '$password', 'current_timestamp(6).000000');";
        $result = mysqli_query($conn , $sql);
        if($result){
            $showAlert = true;
            if($showAlert){
              echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> Your Signup Confirm now You can login!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
            }
            // header("Location : /newforum/index.php");
           
           

        }
        
        
      }
      else{
        $showError = "Password do not match";
      }
      
    
    
        
      
        

    
    
  }

}


?>

