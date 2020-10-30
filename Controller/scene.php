<?php
	require_once '../Model/Model.php';
	require_once '../Model/Utilisateur.php';

	session_start();

	if(!isset($_SESSION['user_connected'])){
  	header("Location:../connexion.php"); //ne pas mettre d'espace avant les ":"
  }
?>



<!DOCTYPE html>
<html>
<head>
  <title>Accounting & Management</title>
  <meta charset="utf-8">

  <link rel="stylesheet" type="text/css" href="../css/styles.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"> 
  <link rel="shortcut icon" href="../images/accounting.png" />

  
</head>

<body>
	

	<div class="couloir" >
		<div id="font">
			
		
		<button id="PorteBDE">Suiv</button>

		</div>
	</div>
	<script src="../js/script.js"></script>
</body>
</html>

