
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./css/topbar.css">
	
<div class="nav-container">
	<nav class="navbar">
		<h1 id="navbar-logo">STARHOTEL</h1>
		<div class="menu-toggle" id="mobile-menu">
			<span class="bar"></span>
			<span class="bar"></span>
			<span class="bar"></span>
		</div>
		<ul class="nav-menu">
			<li><a href="home.php" class="nav-links">Pradžia</a></li>
			<li><a href="about_us.php" class="nav-links">Apie Mus</a></li>
			<li><a href="contacts.php" class="nav-links">Susisiekime</a></li>
			<li><a href="comment.php" class="nav-links">Atsiliepimai</a></li>
			<?php
                    if (!isset($_SESSION['id'])) {       
                    ?>
			<li><a href="login.php" class="nav-links">Prisijungti</a></li>
			<?php }else{?>
			<li><a href="log_out.php" class="nav-links nav-links-btn">Atsijungti</a></li>
			  <?php  }?>  
			
		</ul>
	</nav>
</div>
<script>
	const menu = document.querySelector('#mobile-menu');
	const menuLinks = document.querySelector('.nav-menu');

	menu.addEventListener('click', function(){
		menu.classList.toggle('is-active');
		menuLinks.classList.toggle('active');

	})
</script>
