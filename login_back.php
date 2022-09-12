<?php
session_start();
include('db_connect.php');

if (isset($_POST['login'])) {
     
  $myusername = mysqli_real_escape_string($conn,$_POST['user']);
    $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
    //$pass = sha1($mypassword);


    $sql = "SELECT Guest_ID, Name, Email FROM guest 
            WHERE User_Name = '$myusername' AND Telefone = '$mypassword'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
          $_SESSION['id'] = $row["Guest_ID"];
          $_SESSION['name'] = $row["Name"];
          $_SESSION['email'] = $row["Email"];
          //$_SESSION['login'] = $myusername;
      header("location: home.php");
    }
  }
   
    else {
    echo '<script>alert("Neteisingas vartotojo duomenys, bandykite dar kartą")</script>'; 
    echo("<script>window.location = 'login.php';</script>");
    }
}

?>