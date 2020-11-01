<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-8 col-lg-8 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h1 class="card-title text-center">Mon compte</h5>
                        <h5> Mes informations : </h5>
                        <p> mon pseudo  : <!-- <?php //echo Utilisateur::getIdentifiant();?>  Marche pas
                   -->
                            <?php  echo $_SESSION['user_connected']->getAttr('identifiant');?> </p> <!-- Marche -->

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