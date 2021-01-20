<?php

$TITLE = "Classement";


$CSS = [
    'View/CSS/header2.css',
    'View/CSS/styles9.css',
    'View/CSS/classement8.css',
];

$JS = [
];

$LIBRAIRIES = [
    'Librairies/jquery-3.5.1.min.js',
];

require 'html_start.php';


require_once 'Model/Classement.php';


$classement = Classement::getClassement();
$pos = 1;



require 'View/header.php';
require 'View/classement.php';
require 'html_end.php';

?>
