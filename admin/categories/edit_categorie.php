<?php
include('../links/db_connect.php');
if (isset($_POST['save_edit'])) {

        $edit_id = $_POST['edit_id'];
	$plot = $_POST['e_plot'];
	$beds = $_POST['e_beds'];
	$single = $_POST['e_single'];
	$duos = $_POST['e_duos'];
	if (($_POST['e_tv']) == "Yra") {
		$tv = 1;
		
	}elseif (($_POST['e_tv']) == "Nėra") {
		$tv = 0;
		
	}
	else{$tv = null;
	}
	if (($_POST['e_wc']) == "Yra") {
		$wc = 1;
		
	}elseif (($_POST['e_wc']) == "Nėra") {
		$wc = 0;
		
	}
	else{$wc = null;
	}
	if (($_POST['e_shower']) == "Yra") {
		$shower = 1;
	

	}elseif (($_POST['e_shower']) == "Nėra") {
		$shower = 0;
		
	}
	else{$shower = null;
	}
	if (($_POST['e_bath']) == "Yra") {
		$bath = 1;
	

	}elseif (($_POST['e_bath']) == "Nėra") {
		$bath = 0;
		
	}
	else{$bath = null;
	}
	if (($_POST['e_balcony']) == "Yra") {
		$balcony = 1;
		
	}elseif (($_POST['e_balcony']) == "Nėra") {
		$balcony = 0;
		
	}
	else{$balcony = null;
	}
	if (($_POST['e_wifi']) == "Yra") {
		$wifi = 1;
	
	}elseif (($_POST['e_wifi']) == "Nėra") {
		$wifi = 0;

	}
	else{$wifi = null;
	}
	if (($_POST['e_gas']) == "Yra") {
		$gas = 1;
	
	}elseif (($_POST['e_gas']) == "Nėra") {
		$gas = 0;
	
	}
	else{$gas = null;
	}
	if (($_POST['e_ref']) == "Yra") {
		$ref = 1;

	}elseif (($_POST['e_ref']) == "Nėra") {
		$ref = 0;
	
	}
	else{$ref = null;
	}
	
                if ($tv === Null || $wc === Null || $shower === Null || $bath === Null || $balcony === Null || $wifi === Null || $gas === Null || $ref === Null) {

                	echo("<script>alert('Netinkamai užpildyti patogumai !!')</script>");
                        echo("<script>window.location = 'categories.php';</script>");
                }else{
                	$sql = "UPDATE room_type SET Room_space='$plot', Beds='$beds', Bed_single='$single', Bed_duos='$duos', TV='$tv', WC='$wc', Shower='$shower', Bath='$bath', Microwave_oven='$gas', Balcony='$balcony', WiFi='$wifi', Refrigerator='$ref'
	  	        WHERE Room_Type_ID = '$edit_id'";
	  	        if (mysqli_query($conn, $sql)) {
		    	echo("<script>alert('Kambario tipo koregacija sėkminga ')</script>");
                        echo("<script>window.location = 'categories.php';</script>");
                }else{
                	echo("<script>alert('Ooops...')</script>");
                        echo("<script>window.location = 'categories.php';</script>");}

                }	
	  	
            }
             mysqli_close($conn);

?>