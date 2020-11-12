<div class="container_inscription">



<form method="post" class="degrade_halloween box">
    <h1>Inscris-toi !</h1>
    <?= $erreur != "" ? '<p style="color: red;">'.htmlspecialchars($erreur).'</p>' : '' ?>
    <label for="identifiant">Pseudo :</label>
    <input type="text" id="identifiant" name="identifiant" value="<?= htmlspecialchars($identifiant) ?>" required>
    <label for="mdp">Mot de Passe :</label>
    <small>6 caractères minimums </small>
    <input type="password" id="mdp" name="mdp" required>
    <label for="remdp">Mot de Passe a nouveau :</label>
    <input type="password" id="remdp" name="remdp" required>
    <input type="submit" name="inscrire" value="S'inscrire">
    <p>Ou si tu as déjà un compte !</p>
    <a href="./connexion.php" class="">Connecte toi !</a>
    
</form>
</div>