<script type="text/javascript">
    var objet_ouvert = "";
    var show_inventaire = false;

    $('.acces').on('click', function (e){
        $('#container').children('#'+$(this)[0]['parentElement']['id']).css('display', 'none')
        $('#container').children('#'+$(this)[0]['id']).css('display', 'block')
    })

    $('.show_objet').on('click', function(e){
        objet_ouvert = $(this).attr('objet');
        $('#'+objet_ouvert).css('display', 'block')
        $('.close_objet').css('display', 'flex')
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
            show_inventaire = !show_inventaire;
        }
        else {
            $('#titre_BN').css('display', 'block');
            $('#container_blocnote').css({'width':'25vw', 'height':'35vh'})
            $('.show_bloc').css({'width':'25vw'})
            $('#blocnote').css('display', 'block');
            show_inventaire = !show_inventaire;
        }
    })

</script>