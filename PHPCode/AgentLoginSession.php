<?php

include 'AgentSystemLogin.php';

$checkuser= $_SESSION['helloagent'];
$ses_sql = mysqli_query($loginconnect, "SELECT * FROM agent WHERE UserName='$checkuser'");
$loginrowmou = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$CurrentAgentID = $loginrowmou['AgentID'];
$CurrentAgent = $loginrowmou['UserName'];
$FirstName = $loginrowmou['FirstName'];
$LastName = $loginrowmou['LastName'];

if(!isset($_SESSION['helloagent'])){
    header("location: AgentLoginUI.php");
}

