<?php
$TITLE = "JEU 1";

require_once 'enigmes/definitions.php';

$CSS = [
        'View/CSS/styles8.css',
        'View/CSS/definitions4.css',
        'View/CSS/stylefin1.css',
        'View/CSS/chargement1.css',
        'View/CSS/inventaire.css'
];
$JS = [
	'View/JS/enigme_definition.php',
    'View/JS/Inventaire.php',
    'View/JS/jeu1.php',
    
];

$LIBRAIRIES = [
        'Librairies/jquery-3.5.1.min.js',
];
$SCENE = [
    'couloir',
    'porteBDE',
    'bureauBDE',
    'ordinateur',
    'connection',
    'toilette',
    'bureauOrdi',
];
$OBJETS = [
	'affiche',
	'cadenas',
    'puzzle',
];

require 'html_start.php';
if(!isset($_SESSION['user_connected'])){
    header("Location:connexion.php"); //ne pas mettre d'espace avant les ":"
}


require 'View/view_chargement.php';
?>
<div id="container" style="background: #64fa7f; width: 100%; height: 100%">
    <?php foreach ($SCENE as $scene):
        require 'View/view_'.$scene.'.php';
    endforeach; ?>
    <?php foreach ($OBJETS as $objet):
        require 'View/Objets/view_'.$objet.'.php';
    endforeach; ?>
    <div class="close_objet" style="position: fixed; height: 100vh; width: 100vw; top:0; left:0; display: none;"></div>

    <img src="View/IMG/poubelle_ferme.png" id="poubelle" ondragover='allowDropPoubelle(event)'></div>
    <div id="affichageInventaire"></div>

    <div style="position: fixed; top: 1vh; left: 15vw; z-index: 50; flex-direction: row; display: flex">
        <a href="index.php" style="color: black; background: white; font-weight: bold; padding: 2vh; border-radius: 2vh">
            Quitter le jeu
        </a>
        <div id="timer" style="margin-left: 1vw; background: white; font-weight: bold; padding: 2vh; border-radius: 2vh;">
            00:00
        </div>
    </div>





    <div id="container_blocnote" class="box" style="position: fixed; bottom: 5vh; right: 5vw; width: 6vh; height: 6vh; border-radius: 6vh; background: white; display: flex; flex-direction: column; justify-content: space-between; align-items: center; z-index: 10000; padding: 3vh; transition: width 300ms, height 300ms">
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
                    <form method="post">
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
                                <p>De combien pensez-vous est le détournement (360) ?</p>
                                <input type="text" id="nbr">
                            </div>
                            <div>
                            <input type="submit" id="valider" />
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
<script type="text/javascript">
    var cpt = 0
    var finiChargement = false;
    function attente() {
        setTimeout(function () {
           compte()
        }, 1000);
    }

    function compte() {
        cpt++;
        afficherCpt()
    }

    function afficherCpt() {
        var minute = parseInt(cpt/60);
        var seconde = cpt%60;
        var affichageMinute = "";
        var affichageSeconde = "";
        if(minute<10) {
            affichageMinute = '0'+minute
        }
        else if(minute>60) {
            affichageMinute = '60'
        }
        else {
            affichageMinute = minute
        }
        if(minute>60) {
            affichageSeconde = '59'
        }
        else if(seconde<10) {
            affichageSeconde = '0'+seconde
        }
        else {
            affichageSeconde = seconde
        }
        document.getElementById('timer').innerHTML = ""+affichageMinute+":"+affichageSeconde+""
        attente()
    }

    initChargement()

    function initChargement(){
         

         chargement(100);
         textChargement(1)
         phraseChargement()
    }

    function phraseChargement(){
        var phrases = { //Si vous voulez rajoutez des phrases vous pouvez ;)
            0 : "Création des fonctions de comptabilité",
            1 : "Vérification des données utilisateur",
            2 : "Vérification anti-cheats",
            3 : "La compta c'est bon pour le moral"
         }

         var numero = Math.floor(Math.random() * Object.keys(phrases).length)
         
         $("#phrase_rigolote_chargement").text(phrases[numero])
         if(!finiChargement)
            setTimeout(() => phraseChargement(), 800)
    }

    function textChargement(dot){
        if(dot == 1){
            $("#titre_chargement").text("Chargement.")
            dot++;
        }else if(dot == 2){
            $("#titre_chargement").text("Chargement..")
            dot++;
        }else if(dot == 3){
            $("#titre_chargement").text("Chargement...")
            dot = 1
        }
        if(!finiChargement)
            setTimeout(() => textChargement(dot), 800)
    }

    function chargement(percent){
        $("#barre_en_cours").css("width", percent+"%");
        $("#percentage_chargement").text(Math.floor(percent)+"%");

        
        if(percent < 100){
            var new_percent = percent+Math.random() * (15 - 5) + 5;
            if(new_percent > 100)
                setTimeout(() => chargement(100), 800);
            else
                setTimeout(() => chargement(new_percent), 800);
        }else{
            finiChargement = true;
            $('#chargement').fadeOut('slow')
            setTimeout(() => {
                $('#chargement').remove()
                attente()
            }, 1000)
            
        }
    }

    

    $('#affichageInventaire').on('click', function (e) {
        $('.itemInventaire').on('click', function (e) {
            
                objet_ouvert = $(this).attr("objet");
                console.log(objet_ouvert) //Recupère l'objet donner en attribut dans la balise
                $('#'+objet_ouvert).css('display', 'flex') //Ouvre la balise avec l'id de l'objet récupérer
                $('.close_objet').css('display', 'flex')
            
        })
    })

</script>
<script type="text/javascript" src="View/JS/formulairefin.js"></script>
<?php
require 'html_end.php';
?>
