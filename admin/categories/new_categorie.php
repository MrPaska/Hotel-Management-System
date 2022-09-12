<?php
include('../links/db_connect.php');
if (isset($_POST['save'])) {

	$plot = $_POST['plot'];
	$beds = $_POST['beds'];
	$single = $_POST['single'];
	$duos = $_POST['duos'];
	if (isset($_POST['tv'])) {
		$tv = $_POST['tv'];
	}else{$tv = 0;}
	if (isset($_POST['wc'])) {
		$wc = $_POST['wc'];
	}else{$wc = 0;}
	if (isset($_POST['shower'])) {
		$shower = $_POST['shower'];
	}else{$shower = 0;}
	if (isset($_POST['bath'])) {
		$bath = $_POST['bath'];
	}else{$bath = 0;}
	if (isset($_POST['balcony'])) {
		$balcony = $_POST['balcony'];
	}else{$balcony = 0;}
	if (isset($_POST['wifi'])) {
		$wifi = $_POST['wifi'];
	}else{$wifi = 0;}
	if (isset($_POST['gas'])) {
		$gas = $_POST['gas'];
	}else{$gas = 0;}
	if (isset($_POST['ref'])) {
		$ref = $_POST['ref'];
	}else{$ref = 0;}
	

	  	$sql = "INSERT INTO room_type (Room_space, Beds, Bed_single, Bed_duos, TV, WC, Shower, Bath, Microwave_oven, Balcony, WiFi, Refrigerator)
		    VALUES ('$plot','$beds','$single','$duos', '$tv', '$wc', '$shower', '$bath', '$gas', '$balcony', '$wifi', '$ref')";
		    if (mysqli_query($conn, $sql)) {
		    	echo("<script>alert('Kambario tipas pridėtas sėkmingai')</script>");
                    echo("<script>window.location = 'categories.php';</script>");
                }else{
                	echo("<script>alert('Ooops...')</script>");
                        echo("<script>window.location = 'categories.php';</script>");
                }
            }
	
?>