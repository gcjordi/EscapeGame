<div id="porteBDE" class="scene" style="background-image: Url(View/IMG/fond.png); background-size: cover;">
    <div class="acces" id="couloir" style="    position: fixed;
    z-index: 2;
    flex-direction: column;
    bottom: 1vh;
    left: 2vw;
    cursor: pointer;
">
        <img src="View/IMG/retour.png" style="width: 5vw">
        <p>Couloir</p>
    </div>
    <div class="<?= $_SESSION['user_connected']->getAttr('role') == 'admin' ? 'acces' : 'show_objet' ?>" objet="cadenas" id="bureauBDE" style="position: absolute;
         transform: translate(-50%, -50%);
         top: 50%;
         left: 50%;
         width: 18vw;
         height: 100%;
         z-index: 30;
        ">

    </div>
</div>
