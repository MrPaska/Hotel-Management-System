<?php
 include('../links/db_connect.php');
 if (isset($_POST['save'])) 
 {
	       $name = $_POST['user'];
	       $sname = $_POST['surname'];
	       $role = $_POST['role'];
	       $user = $_POST['user_name'];
	       $pass = $_POST['password'];
	       $pass = sha1($pass);
	       $mail = $_POST['email'];
	
	$db = mysqli_query($conn, "SELECT User_Name FROM users WHERE User_Name = '$user'");
      if (mysqli_num_rows($db) > 0) { // Jei tokiu eiluciu yra
         echo("<script>alert('Toks vartotojo vardas jau yra užregistruotas!')</script>");
         echo("<script>window.location = 'users.php';</script>");

      }
      else{
      	$sql = "INSERT INTO users (Name, Surname, Role_ID, User_Name, Password, Email)
		VALUES ('$name','$sname','$role','$user', '$pass', '$mail')";
      }

		if (mysqli_query($conn, $sql)){

			echo("<script>alert('Vartotojas sėkmingai užregistruotas')</script>");
			echo("<script>window.location = 'users.php';</script>");
		}
		else{

			///echo("<script>alert('Oops...')</script>");
			///echo("<script>window.location = 'users.php';</script>");
		}
	}
?>
