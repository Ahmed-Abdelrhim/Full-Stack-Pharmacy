<?php 
$host = 'localhost';
$user = "root";
$password = "";
$dbName = "pharmacy";
$connect = mysqli_connect( $host , $user , $password , $dbName );
session_start();

function auth()
{
    if (isset($_SESSION['email']) && $_SESSION['email'] != "") {
    } else {
        header("location:/pharmacy/userPanel/user/login.php");
    }
}
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("location:/pharmacy/userPanel/user/login.php");
}

// git config --global user.name"Ahmed-Abdelrhim"
// git config --global user.email"aabdelrhim974@gmail.com"
// git config --global user.password "saso03121011"
// git push -u origin main

?>