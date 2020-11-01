<div class="container_profil">
    <div class="degrade_halloween">
    <h1 class="card-title text-center">Mon compte</h1>
    <h5> Mes informations : </h5>
        <p> Mon pseudo  : <?= $_SESSION["user_connected"]->getAttr('identifiant') ?></p>

    <h5> Mes classements : </h5>
    <a href="logout.php">Se Déconnecter</a>
    </div>
</div>