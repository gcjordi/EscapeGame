<?php
require_once 'Model/Model.php';
require_once 'Model/Utilisateur.php';

session_start();

//Fonctions
function convertSecondToMinute($second){
    if($second > 59){
        $minute = intval($second/60);
        $seconde = intval($second%60);
    }else{
        $minute = 0;
        $seconde = intval($second);
    }
    if($minute < 10)
        $minute = "0".$minute;
    

    if($seconde < 10)
        $seconde = "0".$seconde;
    
    return $minute." : ".$seconde;
}


?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <?php foreach ($CSS as $css) : ?>
        <link rel="stylesheet" type="text/css" href=<?= $css ?>>
    <?php endforeach;?>
    <?php foreach ($LIBRAIRIES as $lib) : ?>
        <script type="text/javascript" src="<?= $lib ?>"></script>
    <?php endforeach;?>
    <title><?=$TITLE?></title>
</head>

<body>