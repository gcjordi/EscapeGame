<?php

$TITLE = "Inscription";


$CSS = [
    'View/CSS/header2.css',
	'View/CSS/styles8.css',
	'View/CSS/styles6.css',
    'View/CSS/inscription1.css',
];

$JS = [

];

$LIBRAIRIES = [

];

require 'html_start.php';

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
					$_SESSION['user_connected'] = Utilisateur::getUserByIdent($identifiant);
					header("Location:profil.php");
				}else{
					$erreur = "Les mots de passe sont différents";
				}
			}else{
				$erreur = "Le mot de passe doit faire un minimum 6 caractères";
			}
			
		}else{
			$erreur = "L'utilisateur existe";
		}
	}else{
		$erreur = "Remplir tous les champs";
	}
}
require 'View/header.php';
require 'View/inscription.php';
require 'html_end.php';

?>