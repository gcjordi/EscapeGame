<script type="text/javascript">
    var objet_ouvert = "";
    var show_inventaire = false;
    var show_rep = false;

    $('.acces').on('click', function (e){
        var acces = true;
        if($(this)[0]['id'] == 'bureauBDE'){
            acces = cadenas_open;
        }else if ($(this)[0]['id'] == 'ordinateur'){
            acces = mdp_find
        }
       
        if(acces){
            $('#container').children('#'+$(this)[0]['parentElement']['id']).css('display', 'none')
            $('#container').children('#'+$(this)[0]['id']).css('display', 'block')
        } 
        
    })

    /*
    Effectue le code lors d'un click sur une balise avec la classe "show_objet"
    */

    $('.show_objet').on('click', function(e){ 
        if ($(this).attr("class")=="show_objet") {
            objet_ouvert = $(this).attr('objet'); //Recupère l'objet donner en attribut dans la balise
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
        if (show_inventaire) {
            $('#titre_BN').css('display', 'none');
            $('#blocnote').css('display', 'none');
            $('#container_blocnote').css({'width':'6vh', 'height':'6vh'})
            $('.show_bloc').css({'width':'6vh'})
            $('#container_reponse').css('display', 'block');
            show_inventaire = !show_inventaire;
        }
        else {
            $('#titre_BN').css('display', 'block');
            $('#container_blocnote').css({'width':'25vw', 'height':'35vh'})
            $('.show_bloc').css({'width':'25vw'})
            $('#blocnote').css('display', 'block');
            $('#container_reponse').css('display', 'none');
            show_inventaire = !show_inventaire;
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