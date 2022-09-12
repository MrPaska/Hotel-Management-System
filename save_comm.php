<?php
include('db_connect.php');
if (isset($_POST['save'])) {
	
	$id = $_POST['id'];
	$name = mysqli_real_escape_string($conn,$_POST['name']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$comment = mysqli_real_escape_string($conn,$_POST['comment']);

	$sql = "INSERT INTO comments (Guest_ID, Name, Email, Comment)
	        VALUES ('$id', '$name', '$email', '$comment')";
	        $result = mysqli_query($conn, $sql);
	        if ($result) {
	        	echo("<script>alert('Pateikta')</script>");
                    echo("<script>window.location = 'comment.php';</script>");
	        }else{
	        	echo("<script>alert('Nepateikta')</script>");
                    echo("<script>window.location = 'comment.php';</script>");
	        }
}
?>