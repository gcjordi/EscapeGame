<script type="text/javascript">
    var cpt = <?php
        if(isset($_SESSION['timer'])){
            if(!empty($_SESSION['timer'])){
                echo $_SESSION['timer'];
            }
            else {
                echo 0;
            }
        }
        else {
            echo 0;
        }
        ?>;
    <?php $_SESSION['timer']=0; ?>
    var finiChargement = false;
    function attente() {

        setTimeout(function () {
            compte()
        }, 1000);
    }

    function compte() {
        cpt++;
        afficherCpt()
        attente()
    }
    afficherCpt()

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
    }

    initChargement()

    function initChargement(){


        chargement(0);
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
                scenarioDebut()
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