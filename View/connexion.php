<div class="container_inscription">
    <form method="post">
    <h1> Pour jouer et être classé connectes-toi !</h1>
    <?= $erreur != "" ? '<p style="color: red;">'.htmlspecialchars($erreur).'</p>' : '' ?>
        <div class="groupe"> 
            <img src="View/IMG/icon/id-card.svg" alt="Nom d'utilisateur" class="inputImg">
            <input type="text" id="identifiant" name="identifiant" placeholder="Nom d'utilisateur" required>
        </div>
        <div class="groupe">
            <img src="View/IMG/icon/padlock.svg" alt="Mot de passe" class="inputImg">
            <input type="password" id="mdp" name="mdp" placeholder="Mot de passe" required>
        
        </div>
    
         <input type="submit" name="connexion" class="boutton" value="Se connecter">
    </form>

    <div class="groupePasCompte">
    <p>Vous n'avez pas de compte ?</p><a href="./inscription.php" class="rouge"> Inscription</a>
    </div> 
</div>

