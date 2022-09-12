<?php
 include('../links/db_connect.php');

 if (isset($_POST['delete_data'])) {

     $id = $_POST['delete_id'];

     $sql = "DELETE FROM users WHERE User_ID='$id'";
     $query = mysqli_query($conn, $sql);

     if ($query) {
         echo("<script>alert('Vartotojas sėkmingai pašalintas')</script>");
         echo("<script>window.location = 'users.php';</script>");
     }
     else{
        echo("<script>alert('Oops...')</script>");
        echo("<script>window.location = 'users.php';</script>");
     }
 }


?>