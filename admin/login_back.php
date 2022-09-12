<?php
session_start();
include('links/db_connect.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
     
  $myusername = mysqli_real_escape_string($conn,$_POST['username']);
    $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
    $pass = sha1($mypassword);


    $sql = "SELECT users.Role_ID, roles.Role_Name FROM users 
            LEFT JOIN roles ON users.Role_ID = roles.Role_ID
            WHERE User_Name = '$myusername' AND Password = '$pass'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
      $_SESSION['login'] = $myusername;
      $_SESSION['role'] = $row["Role_Name"];
      header("location: /Hotel%20Management%20System/admin/home/home.php");
    }
  }
   
    else {
    echo '<script>alert("Neteisingas vartotojo duomenys, bandykite dar kartą")</script>'; 
    echo("<script>window.location = '/Hotel%20Management%20System/admin/login.php';</script>");
    }
}

?>