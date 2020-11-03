<?php
	require_once '../Model/Model.php';
	require_once '../Model/Utilisateur.php';

	session_start();

	if(!isset($_SESSION['user_connected'])){
  	header("Location:../connexion.php"); //ne pas mettre d'espace avant les ":"
  }
?>



<!DOCTYPE html>
<html id="fondjeu">
<head>
  <title>La Casse du BDE</title>
  <meta charset="utf-8">

  <link rel="stylesheet" type="text/css" href="../view/css/jeu1.css">
  <link rel="shortcut icon" href="../View/IMG/accounting.png" />
</head>

<body>
	

	<div>
	
			
		
		<button id="PorteBDE">Suiv</button>

	
	</div>
	<script src="../View/js/script.js"></script>
</body>
</html>

