<?php

$TITLE = "Profil";


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
require_once 'Model/Classement.php';

if(!isset($_SESSION['user_connected']) && !(isset($_GET['ident']) && !empty($_GET['ident']))){
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

$tentatives = Classement::getAllTentatives($user_profil->getAttr('id'));


?>
<?php
require 'View/header.php';
require 'View/profil.php';
require 'html_end.php';

?>

