<?php
session_start();
   if(session_destroy()) {
      header("Location: /Hotel%20Management%20System/home.php");
      }
?>