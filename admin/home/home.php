<?php
session_start();
include('../links/check_session.php');
?>
<!DOCTYPE html>
<html lang="lt">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../css/style.css">
  <title>Viešbučio valdymo sistema</title>
</head>
<body>
<?php include('../links/navbar.php'); ?>
  <h1 class="label">Viešbučio valdymo sistema</h1>
  <hr>
  <div class="container">
  <div class="jumbotron">
    <?php
    if(NULL !==($_SESSION['login'] && NULL !==($_SESSION['role']))){
    echo "<h2>Sveiki sugrįžę,". ($_SESSION['login']). "</h2>";
    echo $_SESSION['role'];

  }
    else{}
  ?>
      
        
    
</body>
</html>