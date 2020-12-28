<div class="container_inscription">
    <form method="post">
    <h1>Mon compte</h1>
    <h5> Mes informations : </h5>
        <p> Mon pseudo  : <?=  $_SESSION["user_connected"]->getAttr('identifiant') ?></p>
       
        <?php  $id = htmlspecialchars($_SESSION["user_connected"]->getAttr('identifiant')); ?>
        <a href=""> <!-- lien à faire qui va dans update.php --></a>
        <!--
    <h5> Mes classements : </h5>-->
   
    <a class="register" href="logout.php">Se Déconnecter</a>
    
</div>

