<?php

if(!isset($_SESSION['login'])){
    header("location: /Hotel%20Management%20System/admin/login.php");
    exit;
}
?>