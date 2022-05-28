<?php 
$host = 'localhost';
$user = "root";
$password = "";
$dbName = "pharmacy";
$connect = mysqli_connect( $host , $user , $password , $dbName );
session_start();
function auth()
//isset($_SESSION['email']) &&
{
    if ( $_SESSION['adminEmail'] != "" || $_SESSION['pharEmail'] != "") {
    } else {
        header("location:/pharmacy/adminPanel/admin/pages-login.php");
        //adminPanel / admin / pages - login . php
    }
}
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("location:/pharmacy/adminPanel/admin/pages-login.php");
}

?>
