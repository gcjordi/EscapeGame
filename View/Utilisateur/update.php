<div>
    <form method="get" action="">
        <fieldset>
            <legend>Mise à jour</legend>
            <?= $erreur != "" ? '<p style="color: red;">'.htmlspecialchars($erreur).'</p>' : '' ?>
            <p>
                <label for="identifiant">Pseudo :</label>
                <input type="text" id="identifiant" name="identifiant" value="<?= htmlspecialchars($identifiant) ?>" required>
            </p>
            <p>
                <label for="mdp">Mot de Passe :</label>
                <small>6 caractères minimums </small>
                <input type="password" id="mdp" name="mdp" required></p>
            <p>
                <label for="remdp">Mot de Passe a nouveau :</label>
                <input type="password" id="remdp" name="remdp" required>
            </p>
            <input type='hidden' name='action' value='<?php echo $next_action; ?>'>
            <input type='hidden' name='controller' value='<?php echo $controller; ?>'>
            <p>
                <input type="submit" value="Envoyer" />
            </p>
        </fieldset> 
    </form>

    

</div>