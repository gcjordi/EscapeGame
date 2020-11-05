<?php
require_once 'Model/Definitions.php';

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
