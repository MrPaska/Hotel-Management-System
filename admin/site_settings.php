<?php
session_start();
include('check_session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="./css/style.css">
	<title>Nustatymai</title>
</head>
<body>
<?php include('navbar.php'); ?>
<h1 id="pav1">Nustatymai</h1>
<div class="container-fluid">
	<div class="card col-lg-12">
		<div class="card-body">
			<form action="" id="manage-settings">
				<div class="form-group">
					<label for="name" class="control-label">Viešbučio pavadinimas</label>
					<input type="text" class="form-control" id="name" name="name" value="" required>
				</div>
				<div class="form-group">
					<label for="email" class="control-label">Viešbučio paštas</label>
					<input type="email" class="form-control" id="email" name="email" value="" required>
				</div>
				<div class="form-group">
					<label for="contact" class="control-label">Viešbučio kontaktai</label>
					<input type="text" class="form-control" id="contact" name="contact" value="" required>
				</div>
				<div class="form-group">
					<label for="about" class="control-label">„Apie mus“ pildymas</label><br>
					<textarea name="about" class="text-jqte"></textarea>

				</div>
				<div class="form-group">
					<label for="" class="control-label">Nuotrauka</label>
					<input type="file" class="form-control" name="img">
				</div>
				<center>
					<button class="btn btn-info btn-primary btn-block col-md-2">Išsaugoti</button>
				</center>
			</form>
		</div>
	</div>
</div>

</body>
</html>

