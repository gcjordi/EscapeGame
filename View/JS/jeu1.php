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
                url: 'View/AJAX/fin.php',
                data: cpt,
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
            $.ajax({
                url: 'View/AJAX/fin.php',
                
                data: {'score' : cpt},
                type: 'post',
                success: function () {
                    alert('Bravo vous avez réussi a déjouer les plans machiavéliques du vilain BDE')
                    document.location.href = "classement.php"  
                }
                }
            )
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