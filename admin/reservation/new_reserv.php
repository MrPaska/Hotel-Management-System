<?php
include('db_connect.php');
if (isset($_POST['save'])) {

	$name = $_POST['name'];
	$sname = $_POST['surname'];
	$room = $_POST['room'];
	$telefone = $_POST['telefone'];
	$check_in = $_POST['check_in'];
	$check_out = $_POST['check_out'];
	$adults = $_POST['adults'];
	$children = $_POST['children'];
	$sum = $_POST['sum'];
	$status = $_POST['status'];
	$duration = round((strtotime($check_out) - strtotime($check_in)) / (60 * 60 * 24));

    $status01 = "Užimtas";

	$status1 = "Atvyko";
    $status2 = "Rezervuota";

    $sql = "SELECT * FROM reservation_status";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			  if ($row['Status'] == $status) {
			  	$status = $row['Reservation_Status_ID'];
			  }
			}
		}

	$db = mysqli_query($conn, "SELECT Guest_ID, Name FROM guest WHERE Surname = '$sname' AND Telefone = '$telefone' AND Name = '$name'");
	  if (mysqli_num_rows($db) > 0) {
		while ($row = mysqli_fetch_assoc($db)) {
			$id = $row['Guest_ID'];
		}
	if ($duration > 0) {
		$db = mysqli_query($conn, "SELECT r.Room_Number, reservation_status.Status FROM reservation r 
	                                LEFT JOIN reservation_status ON r.Reservation_Status_ID = reservation_status.Reservation_Status_ID
	                                WHERE r.Room_Number = '$room'");
		if (mysqli_num_rows($db) > 0) {
		   while ($row = mysqli_fetch_assoc($db)) {
		   	$st = $row['Status'];
		   }
		     if ($st == $status1 || $st == $status2 ) {

		     	echo("<script>alert('Kambarys užimtas!')</script>");
                echo("<script>window.location = 'booked.php';</script>");

		           }else{
			        
                       $sql = "INSERT INTO reservation (Guest_ID, Room_Number, Reservation_Duration ,Check_In, Check_Out, Adults, Children, Price,Reservation_Status_ID)
		               VALUES ('$id','$room','$duration','$check_in', '$check_out', '$adults', '$children', '$sum', '$status')";
		               $result1 = mysqli_query($conn, $sql);}

		               if (isset($result1)) {
		    	echo("<script>alert('Rezervacija pridėta sėkmingai')</script>");
                    echo("<script>window.location = 'booked.php';</script>");
                }else{
                	echo("<script>alert('Klaida, kambarys nepridėtas!')</script>");
                    echo("<script>window.location = 'booked.php';</script>");}
            
        }else{
    	    echo("<script>alert('Nėra tokio kambario')</script>");
                echo("<script>window.location = 'booked.php';</script>");}
       

    } else{
    	    echo("<script>alert('Nakvynės trukmė 0 naktų!')</script>");
                echo("<script>window.location = 'booked.php';</script>");}

}else{
       echo("<script>alert('Tokio svečio nėra')</script>");
           echo("<script>window.location = 'booked.php';</script>");}
       }

?>