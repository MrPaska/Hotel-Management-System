<?php
include('../links/db_connect.php');
if (isset($_POST['save_edit'])) {

    $edit_id = $_POST['edit_id'];
	$name = $_POST['e_name'];
	$sname = $_POST['e_surname'];
	$uname = $_POST['e_username'];
	$telefone = $_POST['e_telefone'];
	$email = $_POST['e_email'];
	$address = $_POST['e_address'];
	$city = $_POST['e_city'];
	$country = $_POST['e_country'];

	  	$sql = "UPDATE guest SET Name='$name', Surname='$sname', User_Name='$uname',
	  	        Telefone='$telefone', Email='$email', Address='$address', City='$city', Country='$country'
	  	        WHERE Guest_ID = '$edit_id'";

		    if (mysqli_query($conn, $sql)) {
		    	echo("<script>alert('Svečio korekcija sėkminga')</script>");
                    echo("<script>window.location = 'guest.php';</script>");
                }else{
                	echo("<script>alert('Ooops...')</script>");
                        echo("<script>window.location = 'guest.php';</script>");}
		
}

?>