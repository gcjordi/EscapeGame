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

if(!isset($_SESSION['user_connected'])){
    header("Location:connexion.php"); //ne pas mettre d'espace avant les ":"
  }

if(isset($_POST['deconnexion'])){
   Utilisateur::disconnect();
}        

$tentatives = Classement::getAllTentatives($_SESSION['user_connected']->getAttr('id'));





function convertSecondToMinute($second){
    if($second > 59){
        $minute = intval($second/60);
        $seconde = intval($second%60);
    }else{
        $minute = 0;
        $seconde = intval($second);
    }
    if($minute < 10)
        $minute = "0".$minute;
    

    if($seconde < 10)
        $seconde = "0".$seconde;
    
    return $minute." : ".$seconde;
}

?>
<?php
require 'View/header.php';
require 'View/profil.php';
require 'html_end.php';

?>

