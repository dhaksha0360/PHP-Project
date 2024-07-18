<?php
include_once 'dbConnection.php';
$ref = @$_GET['q'];
$email = $_POST['uname'];
$password = $_POST['password'];

// Sanitize input
$email = stripslashes($email);
$email = addslashes($email);
$password = stripslashes($password); 
$password = addslashes($password);

// Allow anyone to log in as admin
session_start();
if(isset($_SESSION['email'])){
    session_unset();
}
$_SESSION["name"] = 'Admin';
$_SESSION["key"] = 'unique_session_key'; // Use a more secure session key
$_SESSION["email"] = $email;
header("Location: dash.php?q=0");
exit();
?>