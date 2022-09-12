<?php
include('../links/db_connect.php');
if (isset($_POST['save'])) {

	$name = $_POST['name'];
	$sname = $_POST['surname'];
	$uname = $_POST['username'];
	$telefone = $_POST['telefone'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$country = $_POST['country'];

	$db = mysqli_query($conn, "SELECT Name FROM guest WHERE Name = '$name' AND Surname = '$sname' AND Telefone = '$telefone'");
	  if (mysqli_num_rows($db) == 0) {
	  	$db1 = mysqli_query($conn, "SELECT Name FROM guest WHERE User_Name = '$uname'");
	  	  if (mysqli_num_rows($db1) == 0) {
	  	$sql = "INSERT INTO guest (Name, Surname, User_Name, Telefone, Email, Address, City, Country)
		    VALUES ('$name','$sname','$uname','$telefone','$email', '$address', '$city', '$country')";
		    if (mysqli_query($conn, $sql)) {
		    	echo("<script>alert('Svečias pridėtas sėkmingai')</script>");
                    echo("<script>window.location = 'guest.php';</script>");
                }else{
                	echo("<script>alert('Ooops...')</script>");
                        echo("<script>window.location = 'guest.php';</script>");}
		}else{
             echo("<script>alert('Toks vartotojo vardas jau užregistruotas!')</script>");
                 echo("<script>window.location = 'guest.php';</script>");}
      }else{
             echo("<script>alert('Toks svečias jau yra!')</script>");
                 echo("<script>window.location = 'guest.php';</script>");}
}

?>