<script type="text/javascript">
    $('.acces').on('click', function (e){
        $('#container').children('#'+$(this)[0]['parentElement']['id']).css('display', 'none')
        $('#container').children('#'+$(this)[0]['id']).css('display', 'block')
    })


    $('.show_objet').on('click', function(e){
    	var objet = canShowObjet($(this).attr('objet'));
    	if(objet.show){
    		$('#'+$(this).attr('objet')).css('display', 'block')
    	}else{
    		console.log("Impossible d'afficher");
    	}
    	
    })

    $('.close_objet').on('click', function(e){
    	$('#'+$(this).attr('objet')).css('display', 'none')
    })



</script>