<?php
require 'DatabaseConnection.php';
session_start();
$loginconnect= openConnection();
$username = "";
$password= "";
$errorarray1 = array();

if (isset($_POST['Agent_Login'])){
    $username = mysqli_real_escape_string($loginconnect,$_POST['Username']);
    $password = mysqli_real_escape_string($loginconnect,$_POST['Password']);
    $password= md5($password);
   $checkusernameexist = mysqli_query($loginconnect, "SELECT * FROM agent WHERE UserName='$username' and Password='$password'");
        $RowsResult = mysqli_num_rows($checkusernameexist);
        if ($RowsResult==1){
            $_SESSION['helloagent']= $username;
            echo'<script>
            alert("Congratulations you have successfully login!");
            window.location.href=\'AgentDashboardUI.php\';
            </script>';
        }
        else{
            array_push($errorarray1, "Username or password is wrong<br>");
        }
}

