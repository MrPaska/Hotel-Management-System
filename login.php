<!DOCTYPE html>

<html lang="lt">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<title>Vartotojo Registracija/Prisijungimas</title>
</head>

<body class="login">
<div class="container">
	<div class="login-box"> 
	<div class="row">
		<div class="col-md-6 box-left">
			<h2>Prisijunkite</h2>
			<form action="login_back.php" method="post">
			<div class="form-group">
				<label>Vartotojo vardas</label>
				<input type="text" name="user" class="form-control" required placeholder="Įveskite vartotojo vardą">
			   </div>
			    <div class="form-group">
			    	<label>Telefono numeris</label>
			    	<input type="password" name="password" class="form-control" required placeholder="Įveskite telefono numerį">
			    </div>
			    <button type="submit" class="btn btn-primary" name="login">Prisijunkite</button><br><br>
			</form>
		</div>
		<div class="col-md-6 box-right" >
			<h2>Užsiregistruokite</h2>
			<form action="reg.php" method="post">
			<div class="form-group">
				<label>Vartotojo vardas</label>
				<input type="text" name="user" class="form-control" required placeholder="Įveskite vartotojo vardą">
			   </div>
			    <div class="form-group">
			    	<label>Telefono numeris</label>
			    	<input type="password" name="password" class="form-control" required placeholder="Įveskite telefono numerį">
			    </div>
			    <div class="form-group">
			    	<label for="email">El. paštas</label>
			    	<input type="email" class="form-control" required placeholder="Įveskite El. paštą" name="email">
			    </div>
			    <button type="submit" class="btn btn-primary" name="rgstr">Užsiregistruoti</button>
			</form>
		</div>
	</div>
</div>
</div>
<div style="height: 55px;"></div>
</body>
</html>