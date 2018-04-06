<?php

$ErrorArray = array();
$UserName= "";
$FirstName= "";
$LastName= "";
$Email= "";
$Password= "";
$ConfirmPassword = "";


if (isset($_POST['Register_Button'])){
    
    $UserName= checkinput($_POST['Register_UserName']);
    
    $FirstName= checkinput($_POST['Register_FirstName']);
    
    $LastName= checkinput($_POST['Register_LastName']);
    
    $Email= checkinput($_POST['Register_Email']);
    
    $Password= checkinput($_POST['Register_Password']);
    
    $ConfirmPassword = checkinput($_POST['Register_ConfirmPassword']);
    
    //Check Agent Details Exist
    //Check the schedule exist already or not
    $CheckDetailsExist= mysqli_query($loginconnect, "Select* from agent where FirstName='$FirstName'and LastName='$LastName' and EmailAddress='$Email' and UserName='$UserName'");
    $CheckNumRows = mysqli_num_rows($CheckDetailsExist);
    if($CheckNumRows==1){
        //Agent details are same and existed
        array_push($ErrorArray, "The details have been added<br>");
    }
    else{
        //if agent details not duplicated
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)){
        array_push($ErrorArray, "Email Format Is Wrong<br>");
    }
    if (filter_var($Email, FILTER_VALIDATE_EMAIL)){
        $CheckEmailExist = mysqli_query($loginconnect, "SELECT * FROM agent WHERE EmailAddress='$Email'");
        $RowsResult = mysqli_num_rows($CheckEmailExist);
        if ($RowsResult>=1){
            array_push($ErrorArray, "Email Already Exist<br>");
        }
    }
    
    if (preg_match('/[^A-Za-z\s]/', $FirstName)){
        array_push($ErrorArray, "FName only allow alphabets and spaces<br>");
    }
    
    if (preg_match('/[^A-Za-z\s]/', $LastName)){
        array_push($ErrorArray, "LName only allow alphabets and spaces<br>");
    }
    
    if (preg_match('/[^A-Za-z0-9]/', $UserName)){
        array_push($ErrorArray, "Username only allow alphabenumeric characters<br>");
    }
    else{
         $CheckExist = mysqli_query($loginconnect, "SELECT * FROM agent WHERE UserName='$UserName'");
        $RowsResult1 = mysqli_num_rows($CheckExist);
        if ($RowsResult1>=1){
            array_push($ErrorArray, "Username Already Exist<br>");
        }
    }
    
    
    if(preg_match('/[A-Za-z0-9]/', $Password)&& preg_match('/[A-Za-z0-9]/', $ConfirmPassword)){
        if ($Password!= $ConfirmPassword){
            array_push($ErrorArray, "Password not match<br>");
        }
    }
    else{
        array_push($ErrorArray, "Password only allow alphabenumeric characters<br>");
    }
    }
    if (empty($ErrorArray)){
        $Password= md5($Password);
        $SaveToDatabase = mysqli_query($loginconnect, "INSERT INTO agent(FirstName,LastName,EmailAddress,UserName,Password,RegisteredBy) VALUES ('$FirstName','$LastName','$Email','$UserName','$Password','$currentAdminID')");
        if($SaveToDatabase){
             echo'<script>
            alert("You have successfully created an agent");
            window.location.href=\'RegisterAgent.php\';
            </script>';
        }
         else{
         echo mysqli_errno($loginconnect);
     }
    }


}
function checkinput($input){
    $NewInput = trim(stripcslashes($input));
    return $NewInput;
}

