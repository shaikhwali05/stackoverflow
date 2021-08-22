<?php 
$username = "root";
$server = "localhost";
$db = "discuss";
$password = "";

$conn = mysqli_connect( $server , $username , $password , $db);
if(!$conn){
    echo "Unsucessful";

}

?>