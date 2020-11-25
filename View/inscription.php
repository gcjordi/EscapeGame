

<div class="container_inscription">
    <form method="post">
    <h1>Inscris-toi !</h1>
    <?= $erreur != "" ? '<p style="color: red;">'.htmlspecialchars($erreur).'</p>' : '' ?>
        <div class="groupe"> 
            <img src="View/IMG/icon/id-card.svg" alt="Nom d'utilisateur" class="inputImg">
            <input type="text" id="identifiant" name="identifiant" value="<?= htmlspecialchars($identifiant) ?>" placeholder="Nom d'utilisateur" required>
        

        </div>
        <div class="groupe">
            <img src="View/IMG/icon/padlock.svg" alt="Mot de passe" class="inputImg">
            <input type="password" id="mdp" name="mdp" placeholder="Mot de passe de six caractères" required>
        
        </div>
        <div class="groupe">
            <img src="View/IMG/icon/padlock.svg" alt="Mot de passe" class="inputImg">
            <input type="password" id="remdp" name="remdp"  placeholder="Verification mot de passe" required>
        </div>
        <div class="groupeCGU">
            <input type="checkbox" class="checkbox" id="checkbox" required />
            <label for="checkbox"></label>
            <p class="cgu">En m'inscrivant, j'accepte les <a href="/cgv" class="rouge">CGV</a> et les <a href="/cgu" class="rouge">CGU</a>, notamment l'utilisation de cookies.</p>
        </div>

         <input type="submit" name="inscrire" class="boutton" value="S'inscrire">
    </form>

    <div class="groupePasCompte">
    <p>Vous avez déjà un compte ? <a href="./connexion.php" class="rouge">Connexion</a></p>
    </div> 
</div>

