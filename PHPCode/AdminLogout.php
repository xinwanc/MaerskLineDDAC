<?php
 include'AdminLoginSession.php';
   
   if(session_destroy()) {
      header("location: ../WebPages/AdminLoginUI.php");
   }

