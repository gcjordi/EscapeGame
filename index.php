<?php
	require_once 'Model/Model.php';
?>



<!DOCTYPE html>
<html>
<head>
  <title>Accounting & Management</title>
  <meta charset="utf-8">

  <link rel="stylesheet" type="text/css" href="./css/styles.css">
  <link rel="stylesheet" type="text/css" href="./css/bootstrap.css"> 
  <link rel="shortcut icon" href="./images/accounting.png" />

 <script src="http://code.jquery.com/jquery-latest.js"></script>
 <script src="js/bootstrap.js"></script> 
  
</head>

<body>
	<header> 
		<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top">
			 <div class="container">
        		<div class="navbar">
					 <a class="navbar-brand" href="#"><img src="./images/accounting.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">Le Casse de la Compta</a>
					 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					   <span class="navbar-toggler-icon"></span>
					 </button>

					 <div class="collapse navbar-collapse" id="navbarSupportedContent">
					   <ul class="navbar-nav mr-auto">
					     <li class="nav-item active">
					       <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
					     </li>
					     <li class="nav-item active">
					       <a class="nav-link" href="./jeux.php">Jeux <span class="sr-only"></span></a>
					     </li>
					     <li class="nav-item active">
					       <a class="nav-link" href="./Classement.php">Classement <span class="sr-only"></span></a>
					     </li>
					      <li class="nav-item active">
					       <a class="nav-link" href="./inscription.php">Inscription <span class="sr-only"></span></a>
					     </li>
					      <li class="nav-item active">
					      	 <a href="./connection.php" class="btn btn-warning" role="button" aria-pressed="true">Connection</a>
					     </li>
					     <li class="nav-item active">
					      	  <a class="nav-link" href="./profil.php">Mon compte <span class="sr-only"></span></a>
					     </li>
					 
					   <!--S'identifier
					   S'inscrire-->
					 </div>
				</div>
			</div>
		</nav>


	</header>

	<div class="fond" >

		<div class="pageune" >
				<br>
				<br>
				<br>
			<div id="font">
				<br>
				<br>
				<br>
				 <div class="container">
				      <div class="jumbotron">
				        <h1>Le projet</h1>
				        <p></p>
				         <p class="text-justify center">Ce projet a pour objectif de réaliser un escape game virtuel sur le thème du management et plus particulièrement de la comptabilité.</p>
				      </div>


					<center>
					<?php 
					echo "<br>";
					echo "Page d'accueil projet S3, bonjour dieu";

					 ?>
					</center>
			</div>
		</div>
	</div>
</div>

Page deux
<footer>
      
</footer>

</body>
</html>

