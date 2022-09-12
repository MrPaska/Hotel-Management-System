<?php
 include('../links/db_connect.php');

 if (isset($_POST['delete_data'])) {

     $id = $_POST['delete_id'];

     $sql = "DELETE FROM reservation WHERE Reservation_ID='$id'";
     $query = mysqli_query($conn, $sql);

     if ($query) {
         echo("<script>alert('Rezervacija sėkmingai pašalinta')</script>");
         echo("<script>window.location = 'booked.php';</script>");
     }
     else{
        echo("<script>alert('Oops...')</script>");
        echo("<script>window.location = 'booked.php';</script>");
     }
 }

?>