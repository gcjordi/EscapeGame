<?php
/*####### PAGE DE CONNEXION A AMELIORER ######*/
require_once 'Model/Utilisateur.php';
session_start();
$erreur = $identifiant = "";

if(isset($_POST['connexion'])){
	if(!empty($_POST['identifiant']) && !empty($_POST['mdp'])){
		$identifiant = $_POST['identifiant'];
		$mdp = $_POST['mdp'];

		$mdp_crypt = Utilisateur::getMdpByIdent($identifiant);
		if($mdp_crypt != false){
			
				if(password_verify($mdp, $mdp_crypt)){
					$_SESSION['user_connected'] = Utilisateur::getUserByIdent($identifiant);
					echo 'Connexion réussi ! ';
				}else{
					$erreur = "Identifiant et Mot de passe ne coïncident pas";
				}	
		}else{
			$erreur = "Utilisateur non trouvé";
		}
	}else{
		$erreur = "Remplir tous les champs";
	}
}



?>

<!DOCTYPE html>
<html>
<head>
  <title>Accounting & Management</title>
  <meta charset="utf-8">

  <link rel="stylesheet" type="text/css" href="./css/styles.css">
  <link rel="stylesheet" type="text/css" href="./css/bootstrap.css"> 
  <link rel="shortcut icon" href="./images/accounting.png" />

 <script src="https://code.jquery.com/jquery-latest.js"></script>
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
					       <a class="nav-link" href="./index.php">Accueil <span class="sr-only">(current)</span></a>
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
					      	 <a href="./connexion.php" class="btn btn-warning" role="button" aria-pressed="true">connexion</a>
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


				<br>
				<br>
				<br>
				<br>			
<center><h1> Pour jouer et être classé connectes-toi !</h1></center>
<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Se connecter</h5>
				<center><?= $erreur != "" ? '<p style="color: red;">'.htmlspecialchars($erreur).'</p>' : '' ?></center>
				<form method="post">
					<div class="form-group">
						<label for="identifiant">
							Pseudo : 
						</label>
						<input class="form-control" type="text" id="identifiant" name="identifiant" value="<?= htmlspecialchars($identifiant) ?>" required>
					</p>
					<p>
						<label for="mdp">
							Mot de Passe : 
						</label>
						<input class="form-control" type="password" id="mdp" name="mdp" required>
					</p>
					<center>
						<input class="btn btn-warning mb-2" type="submit" name="connexion" value="Se connecter">
					</center>	
					<center>ou si tu n'es pas inscrit</center>
					<br>	
				 	<center>
						<a href="./inscription.php" class="btn btn-warning" role="button" aria-pressed="true">S'inscrire</a>
					</center>
				    </div>
				</form>
             </div>
        </div>
       </div>
    </div>
  </div>
			</div>
		</div>
	</div>
</div>


<footer>
      
</footer>

</body>
</html>

