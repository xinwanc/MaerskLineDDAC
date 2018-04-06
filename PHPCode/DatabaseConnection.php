<?php
function openConnection(){
    $databasehost = "maersklinefinal-mysqldbserver.mysql.database.azure.com";
    $databaseuser ="yuki@maersklinefinal-mysqldbserver";
    $databasepassword = "tung1234!";
    $database = "maersk";
    
    $connecttodb = new mysqli($databasehost, $databaseuser, $databasepassword, $database) or die("Connect failed: %s\n". $conn -> error);
     
    return $connecttodb;
}

function CloseCon($connecttodb)
 {
    $connecttodb -> close();
 }

