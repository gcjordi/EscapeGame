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
	<title></title>
</head>
<body>

	<?= $erreur != "" ? '<p>'.htmlspecialchars($erreur).'</p>' : '' ?>


	<form method="post">
		<p>
			<label for="identifiant">
				Identifant : 
			</label>
			<input type="text" id="identifiant" name="identifiant" value="<?= htmlspecialchars($identifiant) ?>" required>
		</p>
		<p>
			<label for="mdp">
				Mot de Passe : 
			</label>
			<input type="password" id="mdp" name="mdp" required>
		</p>
		<input type="submit" name="connexion" value="Se connecter">
	</form>
</body>
</html>