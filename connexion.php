<?php

$TITLE = "Connexion";


$CSS = [
    'View/CSS/header2.css',
	'View/CSS/styles9.css',
	'View/CSS/styles6.css',
	'View/CSS/inscription2.css',
];

$JS = [

];

$LIBRAIRIES = [

];

require 'html_start.php';

$erreur = $identifiant = "";

if(isset($_POST['connexion'])){
	if(!empty($_POST['identifiant']) && !empty($_POST['mdp'])){
		$identifiant = $_POST['identifiant'];
		$mdp = $_POST['mdp'];

		$mdp_crypt = Utilisateur::getMdpByIdent($identifiant);
		if($mdp_crypt != false){
			
				if(password_verify($mdp, $mdp_crypt)){
					$_SESSION['user_connected'] = Utilisateur::getUserByIdent($identifiant);
                    header('Location:index.php');
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

    require 'View/header.php';
    require 'View/connexion.php';
    require 'html_end.php';
?>