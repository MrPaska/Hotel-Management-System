<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Prisijungimas</title>
   <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/login_style.css">
  </head>
  <body id="login">
<div class="login-box">
  <h1>Login</h1>
  <form action="login_back.php" method="post">
  <div class="textbox">
    <i class="fa fa-user"></i>
    <input type="text" name="username" required placeholder="Vartotojo vardas">
  </div>
  <div class="textbox">
    <i class="fa fa-lock"></i>
    <input type="password" name="password" required placeholder="Slaptažodis">
</div>
<input  type="submit" class="btn" value="Prisijungti">
</div>
</form>
  </body>
</html>
