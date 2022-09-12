<?php
 include('../links/db_connect.php');

 if (isset($_POST['delete_data'])) {

     $id = $_POST['delete_id'];

     $sql = "DELETE FROM room WHERE Room_ID='$id'";
     $query = mysqli_query($conn, $sql);

     if ($query) {
         echo("<script>alert('Kambarys sėkmingai pašalinta')</script>");
         echo("<script>window.location = 'rooms.php';</script>");
     }
     else{
        echo("<script>alert('Oops...')</script>");
        echo("<script>window.location = 'rooms.php';</script>");
     }
 }

?>