<script type="text/javascript">
    var objet_ouvert = "";

    $('.acces').on('click', function (e){
        $('#container').children('#'+$(this)[0]['parentElement']['id']).css('display', 'none')
        $('#container').children('#'+$(this)[0]['id']).css('display', 'block')
    })


    $('.show_objet').on('click', function(e){
    	var objet = canShowObjet($(this).attr('objet'));
    	if(objet.show){
    	    objet_ouvert = $(this).attr('objet');
    		$('#'+$(this).attr('objet')).css('display', 'block')
            $('.close_objet').css('display', 'block')
    	}else{
    		console.log("Impossible d'afficher");
    	}
    	
    })

    $('.close_objet').on('click', function(e){
    	$('#'+objet_ouvert).css('display', 'none')
        $('.close_objet').css('display', 'none')
    })



</script>