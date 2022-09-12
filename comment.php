<?php
session_start();
include('db_connect.php');
include('bar.php');
?>
<!DOCTYPE html>
<html lang="lt">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<title>Atsiliepimai</title>
</head>
<body class="comment">
	
	<div class="wrapper">
		<?php 
		if (isset($_SESSION['id'])) {
			$rs_id = Null;
		
		$ss_id = $_SESSION['id'];
		$sql = "SELECT Reservation_Status_ID FROM reservation
		        WHERE Guest_ID = '$ss_id'";
		        $result = mysqli_query($conn, $sql);
		        if (mysqli_num_rows($result) > 0) {
                       while ($row = mysqli_fetch_assoc($result)) {
                       	$rs_id = $row['Reservation_Status_ID'];
                       }
                    }

		
		if ($rs_id !== Null) {
		
		?>
		<form action="save_comm.php" method="post" class="form">
			<div class="row">
			<div class="input-group">
				<label for="comment">Vardas</label>
				<input type="text" id="name" name="name" value="<?php echo $_SESSION['name'];?>" required pattern="[A-Ža-ž]{4,}">
			</div>
			<div class="input-group">
				<label for="comment">El. paštas</label>
				<input type="email" id="email" name="email" value="<?php echo $_SESSION['email'];?>" required>
			</div>
			</div>
			<div class="input-group textarea">
				<label for="comment">Atsiliepimas</label>
				<textarea name="comment" id="comment" placeholder="Parašyti atsiliepimą" required></textarea> 
			</div>
			<div class="input-group">
				<input type="hidden" name="id" value="<?php echo $_SESSION['id'];?>">
				<button type="submit" name="save" class="btn">Pateikti Atsiliepimą</button>
			</div>
		</form>
	<?php }else{?>
		<div class="input-group">
				<label for="" class="text-danger">Neturite rezervacijų</label>	
			</div>
			<br>
	<?php
}
}else{
	?>
		<div class="input-group">
				<label for="" class="text-danger">Prisijunkite norint palikti atsiliepimą</label>	
			</div>
			<br>
			<?php
		}
		?>

<?php
         $sql = "SELECT Name, Email, Comment FROM comments";
         $result = mysqli_query($conn, $sql);
     if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
           
         ?>
         <div class="prev-comments">
			<div class="single-item">
				<h4><?php echo $row['Name'];?></h4>
				<a href="mailto:<?php echo $row['Email'];?>"><?php echo $row['Email'];?></a>
				<p><?php echo $row['Comment'];?></p>
			</div>
			
		</div>
<br>
		<?php }
	}else{
		echo "Tuščia";
		
	}
?>

	</div>
	<div class="comment_bar"></div>
 <?php include('copyright.php'); ?>
</body>
</html>