<?php
 include('../links/db_connect.php');

 if (isset($_POST['delete_data'])) {

     $id = $_POST['delete_id'];

     $sql = "DELETE FROM comments WHERE ID='$id'";
     $query = mysqli_query($conn, $sql);

     if ($query) {
         echo("<script>alert('Atsiliepimas sėkmingai pašalintas')</script>");
         echo("<script>window.location = 'comments.php';</script>");
     }
     else{
        echo("<script>alert('Oops...')</script>");
        echo("<script>window.location = 'comments.php';</script>");
     }
 }


?>