<?php
    require_once 'Model/Model.php';
    require_once 'Model/Utilisateur.php';
/*####### PAGE De Déconnexion A AMELIORER ######*/

session_start();

if(!isset($_SESSION['user_connected'])){
    header("Location:connexion.php"); //ne pas mettre d'espace avant les ":"
  }

if(isset($_POST['deconnexion'])){
   Utilisateur::disconnect();
}             

?>



<!DOCTYPE html>
<html>
<head>
  <title>Mon compte</title>
  <meta charset="utf-8">

  <link rel="stylesheet" type="text/css" href="./css/styles.css">
  <link rel="stylesheet" type="text/css" href="./css/bootstrap.css"> 
  <link rel="shortcut icon" href="./images/accounting.png" />

 <script src="http://code.jquery.com/jquery-latest.js"></script>
 <script src="js/bootstrap.js"></script> 
  
</head>

<body>
    <header> 
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top">
             <div class="container">
                <div class="navbar">
                     <a class="navbar-brand" href="#"><img src="./images/accounting.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">Le Casse de la Compta</a>
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                       <span class="navbar-toggler-icon"></span>
                     </button>

                     <div class="collapse navbar-collapse" id="navbarSupportedContent">
                       <ul class="navbar-nav mr-auto">
                         <li class="nav-item active">
                           <a class="nav-link" href="./index.php">Accueil <span class="sr-only">(current)</span></a>
                         </li>
                         <li class="nav-item active">
                           <a class="nav-link" href="./jeux.php">Jeux <span class="sr-only"></span></a>
                         </li>
                         <li class="nav-item active">
                           <a class="nav-link" href="./Classement.php">Classement <span class="sr-only"></span></a>
                         </li>
                          <li class="nav-item active">
                           <a class="nav-link" href="./inscription.php">Inscription <span class="sr-only"></span></a>
                         </li>
                          <li class="nav-item active">
                             <a href="./connexion.php" class="btn btn-warning" role="button" aria-pressed="true">connexion</a>
                         </li>
                         <li class="nav-item active">
                              <a class="nav-link" href="#">Mon compte <span class="sr-only"></span></a>
                         </li>
                     
                       <!--S'identifier
                       S'inscrire-->
                     </div>
                </div>
            </div>
        </nav>


    </header>

    <br>
    <br>
    <br>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-8 col-lg-8 mx-auto">
            <div class="card card-signin my-5">
              <div class="card-body">
                <h1 class="card-title text-center">Mon compte</h5>
                    <h5> Mes informations : </h5>
                    <p> mon pseudo : <!-- <?php //echo Utilisateur::getIdentifiant();?>  Marche pas --> </p>

                    <h5> Mes classements : </h5>
                    <br>

                    <h5> Modifier : </h5> <!-- se déco à faire -->
                    <br>
                    <form method="post">
                    <input class="btn btn-warning mb-2" type="submit" name="deconnexion" value="Se deconnecter">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
      
</footer>

</body>
</html>

