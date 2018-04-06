<?php
include'AgentLoginSession.php';
   
   if(session_destroy()) {
      header("location: ../WebPages/AgentLoginUI.php");
   }

