<?php
/*####### PAGE D'INSCRIPTION A AMELIORER ######*/
require_once 'Model/Utilisateur.php';

$erreur = $identifiant = "";

if(isset($_POST['inscrire'])){
	if(!empty($_POST['identifiant']) && !empty($_POST['mdp']) && !empty($_POST['remdp'])){
		$identifiant = $_POST['identifiant'];
		$mdp = $_POST['mdp'];
		$remdp = $_POST['remdp'];

		if(!Utilisateur::existByIdent($identifiant)){
			if(strlen($mdp) >= 6){
				if($mdp === $remdp){
					Utilisateur::saveUtilisateur($identifiant, password_hash($mdp, PASSWORD_BCRYPT));
				}else{
					$erreur = "Les mots de passe sont différents";
				}
			}else{
				$erreur = "Le mot de passe de faire minimum 6 caractères";
			}
			
		}else{
			$erreur = "L'utilisateur existe";
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
		<p>
			<label for="remdp">
				Mot de Passe a nouveau : 
			</label>
			<input type="password" id="remdp" name="remdp" required>
		</p>
		<input type="submit" name="inscrire" value="S'inscrire">
	</form>
</body>
</html>