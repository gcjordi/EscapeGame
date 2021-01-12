<?php

require_once '../../Model/Utilisateur.php';
require_once '../../Model/Classement.php';


session_start();



if(isset($_POST['score'])){
	if(isset($_SESSION['user_connected'])){
		if($_SESSION['user_connected']->getAttr('temps') == NULL){
			Classement::insertClassement($_GET['score']);

		}else{
			Classement::updateClassement($_GET['score']);

		}
	}
}
?>