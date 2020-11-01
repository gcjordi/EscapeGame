<div class="container_inscription">
<?= $erreur != "" ? '<p>'.htmlspecialchars($erreur).'</p>' : '' ?>


<form method="post" class="degrade_halloween box">
    <h1>Inscris-toi !</h1>
    <label for="identifiant">Pseudo :</label>
    <input type="text" id="identifiant" name="identifiant" value="<?= htmlspecialchars($identifiant) ?>" required>
    <label for="mdp">Mot de Passe :</label>
    <input type="password" id="mdp" name="mdp" required>
    <label for="remdp">Mot de Passe a nouveau :</label>
    <input type="password" id="remdp" name="remdp" required>
    <input type="submit" name="inscrire" value="S'inscrire">
    <p>Ou si tu as déjà un compte !</p>
    <a href="./inscription.php" class="">Se Connecter</a>
</form>
</div>