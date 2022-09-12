<?php
 include('../links/db_connect.php');
 if (isset($_POST['save'])) 
 {
	       $room = $_POST['room'];
	       $type = $_POST['type'];
	       $status = $_POST['status'];
	       $price = $_POST['price'];
	       $file = $_FILES['img']["name"]; // Paima img kaip .bin ir jos pavadinima
	       $extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION); // Get information about a file path: ir returnina tik extension(formata)
	          
	          $db ="SELECT Room_Number FROM room WHERE Room_Number='$room'";
	          $query = mysqli_query($conn, $db);

	          if (mysqli_num_rows($query) == 0){
	          	 

	          	if ($extension=='jpg' || $extension=='jpeg' || $extension=='png' || $extension=='gif') {
	          		$sql = "INSERT INTO room (Room_Number, Room_Type_ID, Status_ID, Price, img)
		           VALUES ('$room', '$type', '$status', '$price', '$file')";

		           
		           if (mysqli_query($conn, $sql)) {
		           	echo("<script>alert('Sėkmingai pridėtas')</script>");
                    echo("<script>window.location = 'rooms.php';</script>");
		           	
		           }else{
		           	die("Connection failed: ". mysqli_error($conn));
		           	echo("<script>alert('Oops...')</script>");
                   echo("<script>window.location = 'rooms.php';</script>");
		           }
		          
		        }else{
		        	echo("<script>alert('Netinkamas formatas!')</script>");
                   echo("<script>window.location = 'rooms.php';</script>");}

                 }else{
                 echo("<script>alert('Toks kambarys jau yra!')</script>");
                    echo("<script>window.location = 'rooms.php';</script>");

                 }
             }

      
?>