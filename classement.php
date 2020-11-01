<?php
	require_once 'Model/Model.php';
	require_once 'Model/Utilisateur.php';

	session_start();
?>



<!DOCTYPE html>
<html>
<head>
  <title>Classement</title>
  <meta charset="utf-8">

  <link rel="stylesheet" type="text/css" href="./css/styles.css">
  <link rel="stylesheet" type="text/css" href="./css/bootstrap.css"> 
  <link rel="shortcut icon" href="./images/accounting.png" />

 <script src="https://code.jquery.com/jquery-latest.js"></script>
 <script src="js/bootstrap.js"></script> 
  
</head>

<body>

<?php
 
//Si le membre est connecté on affiche le menu-connection
if(isset($_SESSION['user_connected'])){ ?>
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
					       <a class="nav-link" href="./index.php">Accueil <span class="sr-only">(current)</span></a>
					     </li>
					     <li class="nav-item active">
					       <a class="nav-link" href="./jeux.php">Jeux <span class="sr-only"></span></a>
					     </li>
					     <li class="nav-item active">
					       <a class="nav-link" href="#">Classement <span class="sr-only"></span></a>
					     </li>
					     <li class="nav-item active">
					      	  <a class="nav-link" href="./profil.php">Mon compte <span class="sr-only"></span></a>
					     </li>
					 </div>
				</div>
			</div>
		</nav>


	</header>


<?php } ?>
<?php
//Si le membre n'est pas connecté on affiche le menu-deconnecter
if(!isset($_SESSION['user_connected'])){ ?>
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
					       <a class="nav-link" href="./index.php">Accueil <span class="sr-only">(current)</span></a>
					     </li>
					     <li class="nav-item active">
					       <a class="nav-link" href="./jeux.php">Jeux <span class="sr-only"></span></a>
					     </li>
					     <li class="nav-item active">
					       <a class="nav-link" href="#">Classement <span class="sr-only"></span></a>
					     </li>
					      <li class="nav-item active">
					       <a class="nav-link" href="./inscription.php">Inscription <span class="sr-only"></span></a>
					     </li>
					      <li class="nav-item active">
					      	 <a href="./connexion.php" class="btn btn-warning" role="button" aria-pressed="true">connexion</a>
					     </li>
					   <!--S'identifier
					   S'inscrire-->
					 </div>
				</div>
			</div>
		</nav>
	</header>
<?php } ?>

<div style="
    background-color: orange;
    color: white;
    background-size: cover;
    width: 100%;
    height: 100vh;">
    			<br>
				<br>
				<br>
	
				<br>
				<br>
				<br>			 
	<center><h1>Prochainement les classements</h1></center>
</div>

<footer>
      
</footer>

</body>
</html>

