<?php
$TITLE = "JEU 1";

require_once 'enigmes/definitions.php';

$CSS = [
        'View/CSS/styles3.css',
        'View/CSS/definitions2.css'
];
$JS = [
	'View/JS/enigme_definition.php',
];

$LIBRAIRIES = [
        'Librairies/jquery-3.5.1.min.js',
];
$SCENE = [
    'couloir',
    'porteBDE',
];
$OBJETS = [
	'affiche',
	'cadenas'
];

require 'html_start.php';
if(!isset($_SESSION['user_connected'])){
    header("Location:connexion.php"); //ne pas mettre d'espace avant les ":"
}
?>
<div id="container" style="background: #64fa7f; width: 100%; height: 100%">
    <?php foreach ($SCENE as $scene):
        require 'View/view_'.$scene.'.php';
    endforeach; ?>
    <?php foreach ($OBJETS as $objet):
        require 'View/Objets/view_'.$objet.'.php';
    endforeach; ?>
    <div class="close_objet" style="position: fixed; height: 100vh; width: 100vw; top:0; left:0; display: none"></div>
</div>
<?php
require 'View/JS/jeu1.php';
require 'html_end.php';
?>
