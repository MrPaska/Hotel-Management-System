<?php
session_start();
include('bar.php');
?>
<!DOCTYPE html>
<html lang="lt">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="./css/style.css">

  <title>Susisiekime</title>
</head>

<body class="bd">
<div class="adaptive">
<div class="label">
  <h1>Susisiekite su mumis</h1>
  <hr class="contactbr">
</div>
<br><br>
<div class="container">
  <div class="row">
    <div class="col-sm-8">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6634.5739575453745!2d24.310149168893734!3d55.737180610010654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46e631ed26c684f3%3A0xb47cb897551ccc43!2sDariaus%20ir%20Gir%C4%97no%20g.%2060%2C%20Panev%C4%97%C5%BEys%2037333!5e0!3m2!1slt!2slt!4v1610194006526!5m2!1slt!2slt" allowfullscreen></iframe>
    </div>

    <div class="col-sm-4" id="contact2">
        <h3>Kontaktai</h3>
        <hr align="left" width="50%" style="background-color: blue;">
        <h4 class="pt-2">Viešbutis</h4>
        <i class="fas fa-globe" style="color:#000"></i> Dariaus ir Girėno g. 60, Panevėžys<br>
        <h4 class="pt-2">Mobilus nr.</h4>
        <i class="fas fa-phone" style="color:#000"></i> <a href="tel:+"> 865504593 </a><br>
        <i class="fab fa-whatsapp" style="color:#000"></i><a href="tel:+"> 865504593 </a><br>
        <h4 class="pt-2">El. paštas</h4>
        <i class="fa fa-envelope" style="color:#000"></i> <a href="mailto:paulius.bak374@go.kauko.lt">paulius.bak374@go.kauko.lt</a><br>
      </div>
  </div>
</div>
<br>
</div>
 <?php include('copyright.php');?>
</body>
</html>
