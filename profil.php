<?php

$TITLE = "Profil";


$CSS = [
  'View/CSS/header2.css',
	'View/CSS/styles9.css',
  'View/CSS/styles6.css',
  'View/CSS/inscription2.css',
  'View/CSS/classement8.css'

];

$JS = [

];

$LIBRAIRIES = [

];

require 'html_start.php';
require_once 'Model/Classement.php';



if(!isset($_SESSION['user_connected'])){
    header("Location:connexion.php"); //ne pas mettre d'espace avant les ":"
}

$user_profil = false;
$isUserConnected = false;

if(isset($_GET['ident']) && !empty($_GET['ident'])){
	$user_profil = Utilisateur::getUserByIdent($_GET['ident']);
}   

if($user_profil == false){
	$user_profil = $_SESSION['user_connected'];
	$isUserConnected = true;
}

if($user_profil->getAttr('id') == $_SESSION['user_connected']->getAttr('id'))
	$isUserConnected = true;

$tentatives = Classement::getAllTentatives($user_profil->getAttr('id'));


?>
<?php
require 'View/header.php';
require 'View/profil.php';
require 'html_end.php';

?>

