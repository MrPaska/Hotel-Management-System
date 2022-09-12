<?php
include('db_connect.php');
if (isset($_POST['save_edit'])) {
	$room = $_POST['room_id'];
	$datein = $_POST['in'];
	$dateout = $_POST['out'];
	$duration = round((strtotime($dateout) - strtotime($datein)) / (60 * 60 * 24));
	$guest = $_POST['guest_id'];
	$status = $_POST['status'];
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$telefone = $_POST['telefone'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	

	

	$sql = "SELECT Reservation_Status_ID FROM reservation_status
	        WHERE Status = '$status'";
	$result = mysqli_query($conn, $sql);
	        if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$status = $row['Reservation_Status_ID'];
			
	}
}

    $sql = "SELECT Price FROM room
           WHERE Room_ID = '$room'";
    $result = mysqli_query($conn, $sql);
	        if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$price = $row['Price'];
		}
		$price = $price * $duration;

	}


    $sql = "INSERT INTO reservation (Guest_ID, Room_Number, Reservation_Duration, Check_In, Check_Out, Price, Reservation_Status_ID)
        VALUES('$guest', '$room', '$duration', '$datein', '$dateout', '$price', '$status')";
    
	        if (mysqli_query($conn, $sql)) {
	        	echo("<script>alert('Rezervacija sėkminga')</script>");
                    echo("<script>window.location = 'home.php';</script>");
	}else{
		echo("<script>alert('Oops...')</script>");
                    echo("<script>window.location = 'home.php';</script>");
	}

}

?>