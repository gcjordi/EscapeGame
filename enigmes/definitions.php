<?php
require_once '../Model/Definitions.php';

$tab_definitions = Definitions::getAllDefinitions(); //Récupère toutes les questions dans la bdd


$tab_def = randomTab($tab_definitions, 4); //Récupère 4 définitions aléatoires depuis tab_definitions 


$defs = [];
$solRep = [];
$reps = [];
$count = 0;

/*
	Boucle permettant de séparer les définitions des réponses dans deux tableaux distincts
	De plus créer un tableau avec les solutions
*/
foreach ($tab_def as $def) {
	array_push($defs, $def->getAttr('definition'));
	$solRep[trim($def->getAttr('definition'))] = $count;
	array_push($reps, $def->getAttr('reponse'));
	$solRep[trim($def->getAttr('reponse'))] = $count;
	$count++;
}



$rand_defs = randomTab($defs, sizeof($defs)); //Récupère aléatoirement toutes les définitions 
$rand_reps = randomTab($reps, sizeof($reps)); //Récupère aléatoirement toutes les réponses

/*
	Fonction qui permet de retourner un tableau de taille donnée en paramètre 
	avec les valeurs aléatoires d'un tableau donné en paramètre 
*/

function randomTab($tab, $size){
	$new_tab = [];
	$nb_used = [];
	while(sizeof($new_tab) != $size){
		$nb = rand(0, sizeof($tab)-1);
		if(!in_array($nb, $nb_used)){
			array_push($new_tab, $tab[$nb]);
			array_push($nb_used, $nb);
		}
	}
	return $new_tab;

}




?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">

		#result{
			font-weight: bold;
			font-size: 20px;
		}

		.green{
			color: green;
		}

		.red{
			color : red;
		}

		.alpha, .num{
			font-weight: bold;
			font-size: 20px;
		}
	</style>
</head>
<body>
	<div id="aff" style="display: inline-flex;">
		<div id="defs" style="margin-right:300px;"></div>
		<div id="reps"></div>
	</div>

	<div id="cherche">
		<form>
			<label>A -</label>
			<input type="number" id="alpha1" min="1" max="4" class="input_number" alpha="a" name="num_a">
			<span style="font-weight: bold; font-size: 40px;">|</span>
			<label>B -</label>
			<input type="number" id="alpha2" min="1" max="4" class="input_number" alpha="b" name="num_b">
			<span style="font-weight: bold; font-size: 40px;">|</span>
			<label>C -</label>
			<input type="number" id="alpha3" min="1" max="4" class="input_number" alpha="c" name="num_c">
			<span style="font-weight: bold; font-size: 40px;">|</span>
			<label>D -</label>
			<input type="number" id="alpha4" min="1" max="4" class="input_number" alpha="d" name="num_d">
			<input type="submit" id="tester_button" name="envoyer" value="Tester">
			<span id="result"></span>
		</form>
	</div>

</body>
<script type="text/javascript" src="../Librairies/jquery.js"></script>
<script type="text/javascript">
var def = <?= json_encode($rand_defs) ?>;
var rep = <?= json_encode($rand_reps) ?>;
var sol = <?= json_encode($solRep) ?>;	
var alpha = ['a', 'b', 'c', 'd']

for(var i = 0; i<def.length; i++){
	$('#defs').append('<p id="d_'+sol[def[i]]+'" al="'+alpha[i]+'" ><span class="alpha">'+alpha[i].toUpperCase()+'</span>|     '+def[i]+'</p>')
	$('#reps').append('<p id="r_'+sol[rep[i]]+'" num="'+(i+1)+'" >'+rep[i]+'     |<span class="num"?>'+(i+1)+'</span></p>')
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
	}
})


$("#tester_button").on('click', function(e){
	e.preventDefault();
	var reponses = [];
	for(var i=1; i<=4; i++){
		var attrAlpha = $('#alpha'+i).attr('alpha');
		var val = $('#alpha'+i).val()
		reponses[attrAlpha] = val
	}
	$("#result").attr('class', '')
	var span = document.getElementById('result')
	if(checkReponses(reponses)){
		
		span.innerHTML = 'Bravo tu as trouvé le code !';
		$('#result').addClass('green')
	}else{
		span.innerHTML = 'Dommage tu t\'es trompé(e), réessaye';
		$('#result').addClass('red')
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
</html>