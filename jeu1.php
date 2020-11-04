<?php
$TITLE = "JEU 1";
$CSS = [
        'View/CSS/styles3.css',
];

$JS = [
];

$LIBRAIRIES = [
        'Librairies/jquery-3.5.1.min.js',
];
$SCENE = [
        'couloir',
    'porteBDE',
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
</div>
<?php
require 'View/JS/jeu1.php';
require 'html_end.php';
?>
