<?php
include('db_connect.php');

 if (isset($_POST['save_edit'])) {

    $edit_id = $_POST['edit_id'];
 	$name = $_POST['e_name'];
	$sname = $_POST['e_surname'];
	$room = $_POST['e_room'];
	$check_in = $_POST['e_check_in'];
	$check_out = $_POST['e_check_out'];
	$adults = $_POST['e_adults'];
	$children = $_POST['e_children'];
	$sum = $_POST['e_sum'];
	$status = $_POST['e_status'];
	$duration = round((strtotime($check_out) - strtotime($check_in)) / (60 * 60 * 24));

	$status01 = "Laisvas";
    $status02 = "Užimtas";
    $status03 = "Rezervuotas";

    $status1 = "Atvyko";
    $status2 = "Rezervuota";
    $status3 = "Išregistruota";
    $status4 = "Atšaukta";
    $status5 = "Neatvyko";


      $db = mysqli_query($conn, "SELECT Guest_ID, Name FROM guest WHERE Surname = '$sname' AND Name = '$name'");
	  if (mysqli_num_rows($db) > 0) {
		while ($row = mysqli_fetch_assoc($db)) {
		}
        if ($duration > 0) {
		    
		    //Kambario busenos kodas
			        $sql = "SELECT * FROM room_status";
                  $result = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($result) > 0 ) {
	                while ($row = mysqli_fetch_assoc($result)) {
		              if ($row['Status'] == $status01) {
			          $id01 = $row['Room_Status_ID'];
			          }

			          if ($row['Status'] == $status02) {
				      $id02 = $row['Room_Status_ID'];
			          }
			
			          if ($row['Status'] == $status03) {
				      $id03 = $row['Room_Status_ID'];
			         }
		           }
	             }
//Laisvas
	             if ($status == $status3 || $status == $status4 || $status == $status5) {
	             	
	             	 $sql = "SELECT * FROM room WHERE Room_Number = '$room'";
			        $result = mysqli_query($conn, $sql);
			       if (mysqli_num_rows($result) > 0 ){
			         while($row = mysqli_fetch_assoc($result)){

				       $type = $row['Room_Type_ID'];
				       $price = $row['Price'];
				       $img = $row['img'];
			}
			           $sql = "UPDATE room
		               SET Room_Type_ID = '$type', Price = '$price', img = '$img', Status_ID = '$id01'
		               WHERE Room_Number = '$room'";
		    $result = mysqli_query($conn, $sql);
	             }
	         }
	         //Uzimtas
	         if ($status == $status1) {
		    
		    $sql = "UPDATE room SET Status_ID = '$id02' WHERE Room_Number = '$room'";
		    $result = mysqli_query($conn, $sql);
	}       //Rezervuotas

	        if ($status == $status2) {
		    $sql = "UPDATE room SET Status_ID = '$id03' WHERE Room_Number = '$room'";
		    $result = mysqli_query($conn, $sql);
	}

	        $sql1 = "SELECT Reservation_Status_ID FROM reservation_status WHERE Status = '$status'";
             $result = mysqli_query($conn, $sql1);
             if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                	$status = $row['Reservation_Status_ID'];
               }
			$sql = "UPDATE reservation SET Room_Number='$room', Reservation_Duration='$duration', Check_In='$check_in', Check_Out='$check_out', Adults='$adults', Children='$children', Price='$sum', Reservation_Status_ID='$status'
			        WHERE Reservation_ID = '$edit_id'";


		    if (mysqli_query($conn, $sql)) {
		    	echo("<script>alert('Rezervacijos koregacija sėkminga')</script>");
                    echo("<script>window.location = 'booked.php';</script>");
                }else{
                	echo("<script>alert('Klaida!')</script>");
                	die(mysqli_error($conn));
                    echo("<script>window.location = 'booked.php';</script>");
                }
            }else{
             echo("<script>alert('Neteisingai įvesta būsena. Tokios būsenos nėra!')</script>");
                echo("<script>window.location = 'booked.php';</script>");}
        }else{
    	  echo("<script>alert('Nakvynės trukmė 0 naktų!')</script>");
            echo("<script>window.location = 'booked.php';</script>");}


        }else{
         echo("<script>alert('Tokio svečio nėra!')</script>");
             echo("<script>window.location = 'booked.php';</script>");}
}
    
?>
