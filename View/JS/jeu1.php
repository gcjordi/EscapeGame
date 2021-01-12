<script type="text/javascript">
    var objet_ouvert = "";
    let inventaire;
    var show_rep = false;
    var show_blocnote = false;

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
        var confirmDelete = confirm("Etes vous sur de vouloir supprimer cet objet ? Cette action est irréversible !")
        var item = event.dataTransfer.getData('text')
        item = inventaire.getItem(item)
        if(confirmDelete &&  item != null){
            
            inventaire.deleteItem(item);
            inventaire.affiche()
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
        console.log('Ferme:#'+$(this)[0]['parentElement']['id'])
        console.log('Ouvre:#'+$(this)[0]['id'])
        console.log($(this))
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

    $('#bureauBDE').on('click', function (e) {
        console.log($(this).attr('class'))

    })

</script>