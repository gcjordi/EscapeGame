<script type="text/javascript">
    var objet_ouvert = "";
    let inventaire;
    var show_rep = false;
    var show_blocnote = false;
    var show_form = false;

    createInventaire();

    function createInventaire(){
        var div = document.getElementById('affichageInventaire')
        
        inventaire = new Inventaire(5, div);
        inventaire.affiche()
    }
    function allowDropPoubelle(event){
        event.preventDefault();
         $("#poubelle").attr('src', 'View/IMG/poubelle_ouverte.png')
    }
    

    
    inventaire.div.ondrop = function(event){
        //Récupération du slot où l'utilisateur veut enregistrer l'objet
        var slot = $("#"+event.target.id).attr('slot')
        droppingInv(slot, event)
    }

    document.getElementById('affiche_coffre').ondrop = function(event){
        var item = event.dataTransfer.getData('text')
        if(item == "afficheClef"){
            inventaire.deleteItem(inventaire.getItem(item));
            inventaire.affiche()
            openCoffre() 
        }
         
    }

    document.getElementById('poubelle').ondrop = function(event){
        var item = event.dataTransfer.getData('text')
        item = inventaire.getItem(item)
        if(item != null){
            var confirmDelete = confirm("Etes vous sur de vouloir supprimer '"+item.nom+"' ? Cette action est irréversible !")
            if(confirmDelete){
                inventaire.deleteItem(item);
                inventaire.affiche()
            }
        }
        $("#poubelle").attr('src', 'View/IMG/poubelle_ferme.png')
    }

    function openCoffre(){
        $('#mini_bout_papier').css('display', 'block')
    }


    function droppingInv(actualSlot, event){
        var slot = actualSlot;
        var o = event.dataTransfer.getData('text')
        
        objet = inventaire.getItem(o)
        if(!inventaire.estPlein()){
            if(objet == null){
              
                var json = JSON.parse($("#"+o).attr('object'))
                objet = new Objet(json.id, json.nom, json.img, json.open)

                $("#"+objet.open).fadeOut()
                if(json.remove == "mini_affiche_releve"){
                    $("#"+json.remove).attr('objet', '')

                }else{
                    $("#"+json.remove).remove()
                    if(json.remove == "mini_bout_papier")
                        $("#affiche_coffre").fadeOut()
                }
                
                $('.close_objet').css('display', 'none')
                if(slot >= 0 && inventaire.inventaire["slot"+slot] == null){
                    inventaire.addItem(slot, objet)
                }else{
                    inventaire.saveItem(objet)
                }

                
            }else{
                inventaire.deplaceItem(slot, objet)
            }
              inventaire.affiche();
        }
      

    }





    $('.acces').on('click', function (e){
        $('#container').children('#'+$(this)[0]['parentElement']['id']).css('display', 'none')
        $('#container').children('#'+$(this)[0]['id']).css('display', 'flex')
    })



    /*
    Effectue le code lors d'un click sur une balise avec la classe "show_objet"
    */



    $('.show_objet').on('click', function(e){ 
        if ($(this).attr("class")=="show_objet" ) {

            objet_ouvert = $(this).attr('objet'); //Recupère l'objet donner en attribut dans la balise

            if(objet_ouvert == "puzzle" && puzzlefini){
                objet_ouvert = "puzzlefini"
            }

            $('#'+objet_ouvert).css('display', 'flex') //Ouvre la balise avec l'id de l'objet récupérer
            $('.close_objet').css('display', 'flex')
        }
        else if ($(this).attr("class")=="acces") {
            $('#container').children('#'+$(this)[0]['parentElement']['id']).css('display', 'none')
            $('#container').children('#'+$(this)[0]['id']).css('display', 'block')
        }

    })

    $('.close_objet').on('click', function(e){
    	$('#'+objet_ouvert).css('display', 'none')
        $('.close_objet').css('display', 'none')
        objet_ouvert = ""
    })

    $('.show_bloc').on('click', function (e) {
        if (show_blocnote) {
            $('#titre_BN').css('display', 'none');
            $('#blocnote').css('display', 'none');
            $('#container_blocnote').css({'width':'6vh', 'height':'6vh'})
            $('.show_bloc').css({'width':'6vh'})
            $('#container_reponse').css('display', 'block');
            show_blocnote = !show_blocnote;
        }
        else {
            $('#titre_BN').css('display', 'block');
            $('#container_blocnote').css({'width':'25vw', 'height':'35vh'})
            $('.show_bloc').css({'width':'25vw'})
            $('#blocnote').css('display', 'block');
            $('#container_reponse').css('display', 'none');
            show_blocnote = !show_blocnote;
        }
    })

    function fermerFormulaire() {
        $('.first').css('display', 'block');
        $('.second').css('display', 'none');
        $('.third').css('display', 'none');
        $('.final').css('display', 'none');
        $('#FF').css('display', 'none');
        $('#titre_FF').css('display', 'none');
        $('#container_formulairefinal').css({'width':'6vh', 'height':'6vh'})
        $('.show_formulairefinal').css({'width':'6vh'})
        show_form = !show_form;
    }

    $('.show_formulairefinal').on('click', function (e) {
        if (show_form) {
            fermerFormulaire()
        }
        else {
            $('#titre_FF').css('display', 'block');
            $('#container_formulairefinal').css({'width':'25vw', 'height':'35vh'})
            $('.show_formulairefinal').css({'width':'25vw'})
            $('#FF').css('display', 'block');
            show_form = !show_form;
        }
    })

    $('#idfondees').on('click', function () {
        $('.first').css('display', 'none');
        $('.second').css('display', 'block');
    })

    $('#idPasfondees').on('click', function () {
        $('.first').css('display', 'none');
        $('.third').css('display', 'block');
    })

    $('#fondeesPasDeDetournement').on('click', function () {
        alert('Vous ne trouvez pas que certaines choses sont louches ? Allez courage ;)')
        fermerFormulaire()
    })

    $('#fondeesEtDetournement').on('click', function () {
        $('.second').css('display', 'none')
        $('.final').css('display', 'block')
    })

    $('#pasFondeesEtSur').on('click', function () {
        $.ajax({
                url: 'View/AJAX/time.php',
                data: {'time' : cpt},
                type: 'post',
                success: function () {
                    document.location.href = "jeu1.php"
                    alert('Toujours réviser la comptabilité')
                }
            }
        )
    })

    $('#pasFondeesEtPasSur').on('click', function () {
        alert('Certaines choses semblent tout de même louches... Courage !')
        fermerFormulaire()
    })

    $('.final>h4').on('click', function () {
        var nbr = $('#nbr').val();
        if(nbr==1750){
            if(excelfini){
                $.ajax({
                        url: 'View/AJAX/fin.php',
                        data: {'score' : cpt-1},
                        type: 'post',
                        success: function () {
                            
                            alert('Bravo vous avez réussi a déjouer les plans machiavéliques du vilain BDE')
                            document.location.href = "classement.php"
                        }
                    }
                )
            }
            else {
                alert("Wopopop... Ne va pas trop vite... Tu ne crois quand même pas t'en sortir aussi rapidement ;)")
            }

        }
        else {
            alert('Vous y êtes presque, mettez tous les documents comptables en lien dans le bilan :)')
            fermerFormulaire()
        }
    })

    $('.show_reponse').on('click', function (e) {
        if (show_rep) {
            $('#reponse').css('display', 'none');
            show_rep = !show_rep;
        }
        else {
            $('#reponse').css('display', 'block');
            show_rep = !show_rep;
        }
    })

</script>
<script type="text/javascript">
    $('#blocnotebde').on('click', function (e) {
        $('#memobde').css('display', 'block')
    })

    $('#memobde').on('click', function (e) {
        $('#memobde').css('display', 'none')
    })

    $('#mini-releve').on('click', function (e) {
        $('#big-releve').css('display', 'block')
    })

    $('#big-releve').on('click', function (e) {
        $('#big-releve').css('display', 'none')
    })


</script>
<script type="text/javascript">
    var mdp_find = false;
    $('#valider').on('click', function(e) {
        e.preventDefault()
        var pass = "Banque512";
        var vpass = document.getElementById('vpass').value;
        if( pass != vpass ) {
            erreur.innerHTML = "Non tout est une affaire de perte et de clef";
            erreur.style.color = "#f00";
        } else {
            mdp_find = true;
            $('#container').children('#connection').css('display', 'none');
            $('#container').children('#bureauOrdi').css('display', 'block');
        }
    } )
</script>
<script type="text/javascript">
    var phrase = "Jeune informaticien, l'heure est grave ! Alors que tout revient à la normale après des mois de confinement, le chef du département informatique s'inquiète sur la santé financière du Bureau des Etudiants (BDE) Informatique. Vous êtes amenés à vérifier si ces inquiétudes sont fondées ou non. N'attendez plus et plongez dans l'univers de la comptabilité du BDE pour vérifier les choses louches...";
    var lettre = 0;
    var scenario = document.getElementById('scenario1');
    var animationfini = false;
    var audio = new Audio('View/sonclavier.mp3');
    var music = new Audio('View/son2.mp3');


    function scenarioDebut() {
        if(lettre!=phrase.length){
            setTimeout(function () {
                scenario.innerHTML = scenario.innerHTML + "" + phrase.charAt(lettre) + "";
                lettre++;
                scenarioDebut();
            }, 20);
        }
        else {
            animationfini = true;
            audio.pause();

        }
    }

    $('#scenarioDebut').on('click', function () {
        if(animationfini){
            $(this).fadeOut()
            $('#couloir').css('display', 'flex')
            afficherCpt(cpt)
            music.loop = true;
            music.play();
        }
    })
</script>
<script type="text/javascript">
    var excelfini = false;

    $('#B1').css("background", "lightblue");
    $('#C1').css("background", "lightblue");
    $('#D1').css("background", "lightblue");
    $('#E1').css("background", "lightblue");
    $('#B9').css("background", "lightgrey");
    $('#C9').css("background", "lightgrey");
    $('#D9').css("background", "lightgrey");
    $('#E9').css("background", "lightgrey");
    $('#C7').css("background", "orange");
    $('#E7').css("background", "orange");
    $('#E2').css("background", "orange");
    $('#E3').css("background", "orange");

    $('#B1').css("font-weight", "bold");
    $('#C1').css("font-weight", "bold");
    $('#D1').css("font-weight", "bold");
    $('#B2').css("font-weight", "bold");
    $('#B3').css("font-weight", "bold");
    $('#B4').css("font-weight", "bold");
    $('#B5').css("font-weight", "bold");
    $('#B6').css("font-weight", "bold");
    $('#B7').css("font-weight", "bold");
    $('#B8').css("font-weight", "bold");
    $('#D8').css("font-weight", "bold");
    $('#D7').css("font-weight", "bold");
    $('#D6').css("font-weight", "bold");
    $('#D5').css("font-weight", "bold");
    $('#D4').css("font-weight", "bold");
    $('#D3').css("font-weight", "bold");
    $('#D2').css("font-weight", "bold");
    $('#D9').css("font-weight", "bold");
    $('#E9').css("font-weight", "bold");
    $('#C9').css("font-weight", "bold");
    $('#B9').css("font-weight", "bold");

    function init() {
        $('#init').css('background', '#e8eaed')
        document.getElementById("B1").value = "Actif";
        document.getElementById("D1").value = "Passif";
        document.getElementById("B2").value = "Actif Immobilisé";
        document.getElementById("C2").value = "1500";
        document.getElementById("B4").value = "Actif Circulant";
        document.getElementById("B5").value = "Créances";
        document.getElementById("C5").value = "200";
        document.getElementById("B6").value = "Caisse";
        document.getElementById("C6").value = "50";
        document.getElementById("B7").value = "Banque";
        document.getElementById("C7").value = "180";
        document.getElementById("D2").value = "Capitaux Propres";
        document.getElementById("E2").value = "1550";
        document.getElementById("D3").value = "Résultat";
        document.getElementById("E3").value = "80";
        document.getElementById("D5").value = "Passif Circulant";
        document.getElementById("D6").value = "Dettes Fournisseurs";
        document.getElementById("E6").value = "300";
        document.getElementById("D7").value = "Découvert Bancaire";
        document.getElementById("E7").value = "0";
        document.getElementById("B9").value = "Total";
        calculerSomme()
    }

    function calculerSomme(){
        var somme1 = 0;
        var somme2 = 0;
        var lettre=["","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
        for (var ligne=1; ligne<8; ligne++) {
            if (!isNaN(parseInt(document.getElementById(""+lettre[3]+ligne+"").value))){
                somme1 += parseInt(document.getElementById(""+lettre[3]+ligne+"").value);
            }
            if (!isNaN(parseInt(document.getElementById(""+lettre[5]+ligne+"").value))){
                somme2 += parseInt(document.getElementById(""+lettre[5]+ligne+"").value);
            }
        }
        document.getElementById('C9').value = somme1
        document.getElementById('E9').value = somme2
    }

    function verif() {
        if(
            document.getElementById('A1').value == "" &&
            document.getElementById('A2').value == "" &&
            document.getElementById('A3').value == "" &&
            document.getElementById('A4').value == "" &&
            document.getElementById('A5').value == "" &&
            document.getElementById('A6').value == "" &&
            document.getElementById('A7').value == "" &&
            document.getElementById('A8').value == "" &&
            document.getElementById('A9').value == "" &&
            document.getElementById('F1').value == "" &&
            document.getElementById('F2').value == "" &&
            document.getElementById('F3').value == "" &&
            document.getElementById('F4').value == "" &&
            document.getElementById('F5').value == "" &&
            document.getElementById('F6').value == "" &&
            document.getElementById('F7').value == "" &&
            document.getElementById('F8').value == "" &&
            document.getElementById('F9').value == "" &&
            document.getElementById('G1').value == "" &&
            document.getElementById('G2').value == "" &&
            document.getElementById('G5').value == "" &&
            document.getElementById('G6').value == "" &&
            document.getElementById('G7').value == "" &&
            document.getElementById('G8').value == "" &&
            document.getElementById('G9').value == "" &&
            document.getElementById('H1').value == "" &&
            document.getElementById('H2').value == "" &&
            document.getElementById('H3').value == "" &&
            document.getElementById('H4').value == "" &&
            document.getElementById('H5').value == "" &&
            document.getElementById('H6').value == "" &&
            document.getElementById('H7').value == "" &&
            document.getElementById('H8').value == "" &&
            document.getElementById('H9').value == "" &&
            document.getElementById('I1').value == "" &&
            document.getElementById('I2').value == "" &&
            document.getElementById('I3').value == "" &&
            document.getElementById('I4').value == "" &&
            document.getElementById('I5').value == "" &&
            document.getElementById('I6').value == "" &&
            document.getElementById('I7').value == "" &&
            document.getElementById('I8').value == "" &&
            document.getElementById('I9').value == "" &&
            document.getElementById('B1').value == "Actif" &&
            document.getElementById('C1').value == "" &&
            document.getElementById('D1').value == "Passif" &&
            document.getElementById('E1').value == "" &&
            document.getElementById('B2').value == "Actif Immobilisé" &&
            document.getElementById('C2').value == "1500" &&
            document.getElementById('D2').value == "Capitaux Propres" &&
            document.getElementById('E2').value == "1500" &&
            document.getElementById('B3').value == "" &&
            document.getElementById('C3').value == "" &&
            document.getElementById('D3').value == "Résultat" &&
            document.getElementById('E3').value == "-230" &&
            document.getElementById('B4').value == "Actif Circulant" &&
            document.getElementById('C4').value == "" &&
            document.getElementById('D4').value == "" &&
            document.getElementById('E4').value == "" &&
            document.getElementById('B5').value == "Créances" &&
            document.getElementById('C5').value == "200" &&
            document.getElementById('D5').value == "Passif Circulant" &&
            document.getElementById('E5').value == "" &&
            document.getElementById('B6').value == "Caisse" &&
            document.getElementById('C6').value == "50" &&
            document.getElementById('D6').value == "Dettes Fournisseurs" &&
            document.getElementById('E6').value == "300" &&
            document.getElementById('B7').value == "Banque" &&
            document.getElementById('C7').value == "0" &&
            document.getElementById('D7').value == "Découvert Bancaire" &&
            document.getElementById('E7').value == "180" &&
            document.getElementById('B8').value == "" &&
            document.getElementById('C8').value == "" &&
            document.getElementById('D8').value == "" &&
            document.getElementById('E8').value == "" &&
            document.getElementById('B9').value == "Total" &&
            document.getElementById('C9').value == "1750" &&
            document.getElementById('D9').value == "" &&
            document.getElementById('E9').value == "1750"
        ){
            $('#C7').css('background', 'lightgreen');
            $('#E7').css('background', 'lightgreen');
            $('#E2').css("background", "lightgreen");
            $('#E3').css("background", "lightgreen");
            document.querySelectorAll('#ordinateur>input').forEach((inp) => {
                inp.setAttribute('disabled', 'disabled')
            })
            excelfini = true;
        }
        else {
            $('#init').css('background', 'pink');
        }
    }

    $('input').on('keyup', function (e){
        console.log($(this)[0].id)
        calculerSomme()
        verif()
    })

    init()

    $('#init').on('click', function (e) {
        var lettre= ["","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"]
        for (var ligne=1; ligne<10; ligne++) {
            for (var colonne=1; colonne<10; colonne++) {
                document.getElementById(""+lettre[colonne]+ligne+"").value = "";
            }
        }
        document.getElementById("G3").value = "Aide: Ceci est un relevé bancaire fraudé, corrigez le...";
        document.getElementById("G4").value = "Aide: Le BDE a une petite mémoire il note tout dans son bloc note...";

        $('#G3').css('font-weight', 'bold')
        init()
    })
</script>
<script type="text/javascript">
    function allowDrop(event) {
        event.preventDefault();
    }
    function drag(event) {
        event.dataTransfer.setData("text", event.target.id);
    }

    var puzzlefini = false;

    function dropping(actual, event) {
        if (!plein(actual) && !puzzlefini) {
            event.preventDefault();
            var data = event.dataTransfer.getData("text");
            event.target.appendChild(document.getElementById(data));
            var position = {
                position : actual.attr("position"),
                top : actual.attr("top"),
                bottom : actual.attr("bottom"),
                left : actual.attr("left"),
                right : actual.attr("right"),
            }
            for(key in position) {
                actual.children("img").css(key, position[key]);
            }
            if($("#dropBox1").attr("puzzle")==$("#dropBox1").children("img").attr("id")&&$("#dropBox2").attr("puzzle")==$("#dropBox2").children("img").attr("id")&&$("#dropBox3").attr("puzzle")==$("#dropBox3").children("img").attr("id")&&$("#dropBox4").attr("puzzle")==$("#dropBox4").children("img").attr("id")&&$("#dropBox5").attr("puzzle")==$("#dropBox5").children("img").attr("id")&&$("#dropBox6").attr("puzzle")==$("#dropBox6").children("img").attr("id")){
                puzzlefini = true;
                $('#puzzle').css('display', 'none')
                $("#puzzlefini").css("display", "block");
                $("#mini_clef").css("display", "block");
                objet_ouvert = "puzzlefini"
            }
        }
    }
    document.getElementById("dropBox1").ondrop = function(event){
        dropping($(this), event);
    };
    document.getElementById("dropBox2").ondrop = function(event){
        dropping($(this), event);
    };
    document.getElementById("dropBox3").ondrop = function(event){
        dropping($(this), event);
    };
    document.getElementById("dropBox4").ondrop = function(event){
        dropping($(this), event);
    };
    document.getElementById("dropBox5").ondrop = function(event){
        dropping($(this), event);
    };
    document.getElementById("dropBox6").ondrop = function(event){
        dropping($(this), event);
    };
    document.getElementById("emppapier1").ondrop = function(event){
        dropping($(this), event);
    };
    document.getElementById("emppapier2").ondrop = function(event){
        dropping($(this), event);
    };
    document.getElementById("emppapier3").ondrop = function(event){
        dropping($(this), event);
    };
    document.getElementById("emppapier4").ondrop = function(event){
        dropping($(this), event);
    };
    document.getElementById("emppapier5").ondrop = function(event){
        dropping($(this), event);
    };
    document.getElementById("emppapier6").ondrop = function(event){
        dropping($(this), event);
    };
    function plein(actual) {
        return actual.children("img").length!==0;
    }
</script>