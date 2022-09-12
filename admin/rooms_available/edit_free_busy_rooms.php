<?php
include('db_connect.php');
if (isset($_POST['save_edit'])) {

    $edit_id = $_POST['edit_id'];
	$room = $_POST['e_room'];
	$status = $_POST['e_status'];

	 $sql = "SELECT Room_Status_ID FROM room_status WHERE Status='$status'";
	  $result = mysqli_query($conn, $sql);
     if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
           $status = $row['Room_Status_ID'];}
        
	  	  $sql = "UPDATE room SET Room_Number='$room', Status_ID='$status'
	  	        WHERE Room_ID = '$edit_id'";

		    if (mysqli_query($conn, $sql)) {
		    	echo("<script>alert('Būsena pakeista')</script>");
                    echo("<script>window.location = 'check_in.php';</script>");
                }else{
                	echo("<script>alert('Ooops...')</script>");
                        echo("<script>window.location = 'check_in.php';</script>");}
                    }else{
                	  echo("<script>alert('Nėra tokios būsenos!')</script>");
                        echo("<script>window.location = 'check_in.php';</script>");}
}

?>