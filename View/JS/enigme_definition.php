<script type="text/javascript">

/*##########
###	Initialisation des variables
######*/

/*##########
###	Section de récupération des tableaux des définitions, des solutions et de la solution,
###	Randomiser par les fonctions se trouvant dans le fichier definitions.php
######*/
var def = <?= json_encode($rand_defs) ?>;
var rep = <?= json_encode($rand_reps) ?>;
var sol = <?= json_encode($solRep) ?>;
var cadenas_open = false;
cadenas_open = <?= $_SESSION['user_connected']->getAttr('role') == 'admin' ? 'true' : 'false' ?>;
var alpha = ['a', 'b', 'c', 'd'];


/*##########
###	Boucle pour ajouter les balises des définitions et des réponses dans leur balise dédiée
### Avec id contenant le numéro de la bonne réponse, la lettre d'alphabet et la définition pour les définitions
### Exemple : <p id="d_0" al="a"><span class="alpha"><span class=""
######*/

for(var i = 0; i<def.length; i++){
	$('#defs').append('<p id="d_'+sol[def[i]]+'" al="'+alpha[i]+'" ><span class="alpha">'+alpha[i].toUpperCase()+'</span>|     '+def[i]+'</p>')
	$('#reps').append('<p id="r_'+sol[rep[i]]+'" num="'+(i+1)+'" ><span class="num">'+(i+1)+'</span> : '+rep[i]+'</p>')
}

function getBonneRep(){
	var tab_rep = [];
	for(var i=0; i<def.length; i++){
		var al = $("#d_"+i).attr("al");
		var num = $("#r_"+i).attr("num");
		tab_rep[al] = num;
	}
	return tab_rep;
}

$('.input_number').on('keyup', function(e){
	var num = $(this).val()
	if(num < 0){
		$(this).val("1")
	}else if(num > 4){
		$(this).val("4")
	}else if(num > 0 && num < 5){
		var input_focus = parseInt($(this).attr('focus'))
		if(input_focus+1 <= 4){
			$('#alpha'+(input_focus+1)).focus()
		}
	}
})

$("#ouvrir_cadenas").on('click', function(e){
	e.preventDefault();
	var reponses = [];
	for(var i=1; i<=4; i++){
		var attrAlpha = $('#alpha'+i).attr('alpha');
		var val = $('#alpha'+i).val()
		reponses[attrAlpha] = val
	}
	if(checkReponses(reponses)){
        $('#cadenas').css('width', 'auto')
        $('#cadenas').css('height', 'auto')
		$('#img_cadenas').attr('src', 'View/IMG/cadenas_ouvert.png')
		$('#form_cadenas').css('display', 'none')
		$('#ouvrir_cadenas').css('display', 'none')
        $('.close_objet').css('display', 'none')
		cadenas_open = true;
		setTimeout(() => $('#cadenas').fadeOut("slow"), 500)
        $('#bureauBDE').toggleClass('show_objet')
        $('#bureauBDE').toggleClass('acces')
        objet_ouvert = "";

    }else{
		$('#img_cadenas').addClass('shake')
		$('#form_cadenas').addClass('shake')
		setTimeout(() => {
			$('#img_cadenas').removeClass('shake')
			$('#form_cadenas').removeClass('shake')
		}, 1000)
	}
	$(".input_number").val("")
	$("#alpha1").focus()
})

function checkReponses(reponses){
	var solutions = getBonneRep();
	var b = true
	for(var i=0; i<alpha.length && b; i++){
		if(solutions[alpha[i]] != reponses[alpha[i]]) b = false 
	}
	return b;
}
</script>