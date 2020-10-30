<?php


$tab_def = [["Tous les biens et droits que possède l'entreprise : bâtiments, fonds de commerce, matériel, créances, brevets déposés.", "Actif"], ["Ils ont une valeur économique négative", "Passif"], ["Est obligatoire pour la majorité des entreprises inscrites au Registre du Commerce", "Journal"]];
$defs = [];
$solRep = [];
$reps = [];
$count = 0;
foreach ($tab_def as $def) {
	array_push($defs, $def[0]);
	$solRep[trim($def[0])] = $count;
	array_push($reps, $def[1]);
	$solRep[trim($def[1])] = $count;
	$count++;
}



$rand_defs = randomTab($defs);
$rand_reps = randomTab($reps);


function randomTab($tab){
	$new_tab = [];
	$nb_used = [];
	while(sizeof($new_tab) != sizeof($tab)){
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
</head>
<body>
	<div id="aff" style="display: inline-flex;">
		<div id="defs" style="margin-right:300px;"></div>
		<div id="reps"></div>
	</div>

	<div id="bonne_rep">Bonnes réponses : </div>
</body>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript">
var def = <?= json_encode($rand_defs) ?>;
var rep = <?= json_encode($rand_reps) ?>;
var sol = <?= json_encode($solRep) ?>;	
var alpha = ['a', 'b', 'c', 'd', 'e']

for(var i = 0; i<def.length; i++){
	$('#defs').append('<p id="d_'+sol[def[i]]+'" al="'+alpha[i]+'" >'+alpha[i]+'|     '+def[i]+'</p>')
	$('#reps').append('<p id="r_'+sol[rep[i]]+'" num="'+(i+1)+'" >'+rep[i]+'     |'+(i+1)+'</p>')
}

function getBonneRep(){
	var tab_rep = [];
	for(var i=0; i<def.length; i++){
		var al = $("#d_"+i).attr("al");
		var num = $("#r_"+i).attr("num");
		tab_rep.push(al+'-'+num);
	}
	return tab_rep;
}


getBonneRep().forEach(el => {
	$("#bonne_rep").append(el+"/")
})


</script>
</html>