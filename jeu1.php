<?php
$TITLE = "JEU 1";

require_once 'enigmes/definitions.php';

$CSS = [
        'View/CSS/styles3.css',
        'View/CSS/definitions4.css',
        'View/CSS/stylefin.css',
];
$JS = [
	'View/JS/enigme_definition.php',
    'View/JS/jeu1.php',
];

$LIBRAIRIES = [
        'Librairies/jquery-3.5.1.min.js',
];
$SCENE = [
    'couloir',
    'porteBDE',
];
$OBJETS = [
	'affiche',
	'cadenas',
];

require 'html_start.php';
if(!isset($_SESSION['user_connected'])){
    header("Location:connexion.php"); //ne pas mettre d'espace avant les ":"
}
?>
<div id="container" style="background: #64fa7f; width: 100%; height: 100%">
    <?php foreach ($SCENE as $scene):
        require 'View/view_'.$scene.'.php';
    endforeach; ?>
    <?php foreach ($OBJETS as $objet):
        require 'View/Objets/view_'.$objet.'.php';
    endforeach; ?>
    <div class="close_objet" style="position: fixed; height: 100vh; width: 100vw; top:0; left:0; display: none;"></div>
    <div id="container_blocnote" style="position: fixed; bottom: 5vh; right: 5vw; width: 6vh; height: 6vh; border-radius: 6vh; background: white; display: flex; flex-direction: column; justify-content: space-between; align-items: center; z-index: 10000; padding: 3vh; transition: width 300ms, height 300ms">
        <div id="blocnote" style="display: none; width: 20vw; height: 20vh">
            <p id="titre_BN" >Bloc-notes</p>
            <textarea style="height: 19vh; width: 20vw;"></textarea>
        </div>
        <div class="show_bloc" style="width: 6vh; height: 6vh; display: flex; flex-direction: row; justify-content: flex-end; align-items: center; cursor: pointer; transition: width 300ms, height 300ms">
            <img src="View/IMG/bloc-note.png" alt="bloc-note" style="width: 6vh; height: 6vh">
        </div>
    </div>
    <div id="container_reponse" style="display: block; position: fixed;bottom: 5vh;right: 15vw;width: 6vh;height: 6vh;border-radius: 6vh;background: white;display: flex;flex-direction: column;justify-content: space-between;align-items: center;z-index: 10000;padding: 3vh;transition: width 300ms, height 300ms;margin-right: 10px;">      
        <div id="reponse" style="display: none; z-index: 2; position: absolute;top: -400%;left: -500%;">
                    <form method="post" action="javascript:verif()">
                        <fieldset>
                        <legend>Vous pensez avoir fini le jeu ?</legend>
                            <div>
                                <p>Les inquiétudes du chef du département informatique sont-elles fondées ?</p>
                                <label><input name="radio1a" type="radio" id="idfondees" value="idfondees" />Oui</label>
                                <label><input name="radio1a" type="radio" id="idPasfondees" value="idPasfondees" />Non</label>
                                </div>
                            <div id="oui">
                            <p>Il y a eu un détournement d’argent ?</p>
                            <label><input name="radio2a" type="radio" id="fondeesEtDetournement" value="fondeesEtDetournement" />Oui</label>
                            <label><input name="radio2a" type="radio" id="fondeesPasDeDetournement" value="fondeesPasDeDetournement" />Non</label>
                            </div>
                            <div id="non">
                                <p>Le chef du département est vraiment inquiet vous êtes sur ?</p>
                                <label><input name="radio3a" type="radio" id="pasFondeesEtSur" value="pasFondeesEtSur" />Oui</label>
                                <label><input name="radio3a" type="radio" id="pasFondeesEtPasSur" value="pasFondeesEtPasSur" />Non</label>
                                
                            </div>
                            <div id="ouioui">
                                <p>De combien pensez-vous est le détournement (100) ?</p>
                                <input type="text" id="nbr">
                            </div>
                            <div>
                            <input type="submit" value="Valider">
                            <span id="msg" style="color:red"></span>
                            </div>
                       </fieldset>
                    </form>
                    </div>
    <div class="show_reponse" style="width: 6vh; height: 6vh; display: flex; flex-direction: row; justify-content: flex-end; align-items: center; cursor: pointer; transition: width 300ms, height 300ms">
    <img src="https://creazilla-store.fra1.digitaloceanspaces.com/emojis/47298/check-mark-button-emoji-clipart-md.png"
         alt="reponse" style="width: 6vh; height: 6vh;">
        </div>

    </div>
</div>
<script type="text/javascript" src="View/JS/formulairefin.js"></script>
<?php
require 'html_end.php';
?>
