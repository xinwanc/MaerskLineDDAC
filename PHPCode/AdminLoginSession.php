<?php

include 'AdminSystemLogin.php';

$checkuser= $_SESSION['hellouser'];
$ses_sql = mysqli_query($loginconnect, "SELECT * FROM admin WHERE Username='$checkuser'");
$loginrowmou = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$currentAdminID = $loginrowmou['ID'];
$CurrentAdmin = $loginrowmou['Username'];
$FirstName = $loginrowmou['FirstName'];
$LastName = $loginrowmou['LastName'];

if(!isset($_SESSION['hellouser'])){
    header("location: AdminLoginUI.php");
}

