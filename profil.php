<?php

$CSS = [
  'View/CSS/header2.css',
	'View/CSS/styles5.css',
  'View/CSS/styles6.css',
  'View/CSS/inscription1.css',

];

$JS = [

];

$LIBRAIRIES = [

];

require 'html_start.php';

if(!isset($_SESSION['user_connected'])){
    header("Location:connexion.php"); //ne pas mettre d'espace avant les ":"
  }

if(isset($_POST['deconnexion'])){
   Utilisateur::disconnect();
}             

?>
<?php
require 'View/header.php';
require 'View/profil.php';
require 'html_end.php';
?>

