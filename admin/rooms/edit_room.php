<?php
 include('../links/db_connect.php');
 if (isset($_POST['save_edit'])) 

 {        $id = $_POST['edit_id'];
	       $room = $_POST['e_room'];
	       $type = $_POST['e_type'];
	       $status = $_POST['e_status'];
	       $price = $_POST['e_price'];
	       $file = $_FILES['e_img']["name"]; // Paima img kaip .bin ir jos pavadinima
	       $extension = pathinfo($_FILES["e_img"]["name"], PATHINFO_EXTENSION); // Get information about a file path: ir returnina tik extension(formata)
	          	
	          	if ($extension=='jpg' || $extension=='jpeg' || $extension=='png' || $extension=='gif') {
	          		$sql = "UPDATE room SET Room_Number='$room', Room_Type_ID='$type', Status_ID='$status', Price='$price', img='$file' WHERE Room_ID='$id'";
		           
		           if (mysqli_query($conn, $sql)) {
		           	echo("<script>alert('Koregacija sėkminga')</script>");
                    echo("<script>window.location = 'rooms.php';</script>");
		           	
		           }else{
		           	die("Connection failed: ". mysqli_error($conn));
		           	echo("<script>alert('Oops...')</script>");
                   echo("<script>window.location = 'rooms.php';</script>");
		           }
		          
		        }else{
		        	echo("<script>alert('Netinkamas formatas!')</script>");
                   echo("<script>window.location = 'rooms.php';</script>");}

                 }

?>