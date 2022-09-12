<?php

include("db_connect.php");
	
	if (isset($_POST['rgstr'])) { // Jei rgstr netuscias

		$u_name = mysqli_real_escape_string($conn, $_POST['user']); // Apsiraso kintamaji ivesto inpute vardu user
		$pass = mysqli_real_escape_string($conn, $_POST['password']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		 
	}

	$db = mysqli_query($conn, "SELECT User_Name from guest WHERE User_Name = '$u_name'");
      if (mysqli_num_rows($db) > 0) { // Jei tokiu eiluciu yra
         echo("<script>alert('Toks vartotojo vardas jau yra užregistruotas!')</script>");
         echo("<script>window.location = 'login.php';</script>");
      }
      else{
        //$pass = sha1($pass); // Slaptazodis uzhashinamas
		$sql = "INSERT INTO guest (User_Name, Telefone, Email)
		VALUES ('$u_name','$pass','$email')";
		
		if (mysqli_query($conn, $sql)){

		echo("<script>alert('Vartotojas sėkmingai užregistruotas')</script>");
 echo("<script>window.location = 'login.php';</script>");

} 
else {
 echo("<script>alert('Vartotojas neužregistruotas')</script>");
 echo("<script>window.location = 'login.php';</script>");
}

mysqli_close($conn);

}
?>
