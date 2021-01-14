<?php
$TITLE = "JEU 1";

require_once 'enigmes/definitions.php';

$CSS = [
        'View/CSS/styles8.css',
        'View/CSS/definitions5.css',
        'View/CSS/stylefin1.css',
        'View/CSS/chargement1.css',
        'View/CSS/inventaire.css',
        'View/CSS/jeu1.css',
];
$JS = [
	'View/JS/enigme_definition.php',
    'View/JS/Inventaire.php',
    'View/JS/jeu1.php',
    'View/JS/Interface.php',
];

$LIBRAIRIES = [
        'Librairies/jquery-3.5.1.min.js',
];
$SCENE = [
        'debut',
    'couloir',
    'porteBDE',
    'bureauBDE',
    'ordinateur',
    'connection',
    'toilette',
    'bureauOrdi',
];
$OBJETS = [
	'affiche',
	'cadenas',
    'puzzle',
];

$INTERFACE = [
        'poubelle',
        'inventaire',
        'top',
        'blocnote',
        'formulaire',
];

require 'html_start.php';
if(!isset($_SESSION['user_connected'])){
    header("Location:connexion.php"); //ne pas mettre d'espace avant les ":"
}

require 'View/view_chargement.php';

?>

<div id="container">
    <?php foreach ($SCENE as $scene):
        require 'View/view_'.$scene.'.php';
    endforeach; ?>
    <?php foreach ($OBJETS as $objet):
        require 'View/Objets/view_'.$objet.'.php';
    endforeach; ?>
    <?php foreach ($INTERFACE as $interface):
        require 'View/Interface/view_'.$interface.'.php';
    endforeach; ?>
    <div class="close_objet"></div>
</div>
<?php
require 'html_end.php';
?>
