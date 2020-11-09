<div class="container_connexion">
    <form method="post" class="degrade_halloween box">
        <h1> Pour jouer et être classé connectes-toi !</h1>
        <?= $erreur != "" ? '<p style="color: red;">'.htmlspecialchars($erreur).'</p>' : '' ?>
        <label for="identifiant">Pseudo :</label>
        <input class="form-control" type="text" id="identifiant" name="identifiant" placeholder="Identifiant" required>
        <label for="mdp">Mot de Passe :</label>
        <input type="password" id="mdp" name="mdp" required>
        <input type="submit" name="connexion" value="Se connecter">
        <p>Ou si tu n'es pas inscrit...</p>
        <a href="./inscription.php" class="">Inscris-toi !</a>
    </form>
</div>