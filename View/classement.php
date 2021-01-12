<?php
require_once 'Model/Classement.php';


$classement = Classement::getClassement();
$pos = 1;


function convertSecondToMinute($second){
    if($second > 59){
        $minute = intval($second/60);
        $seconde = intval($second%60);
    }else{
        $minute = 0;
        $seconde = $second;
    }
    if($minute < 10)
        $minute = "0".$minute;
    

    if($seconde < 10)
        $seconde = "0".$seconde;
    
    return $minute." : ".$seconde;
}   
?>





<table id="container_classement">
    <thead>
        <tr>
            <th class="head">
                Classement
            </th>
            <th class="head">
                Pseudo
            </th>
            <th class="head">
                Temps
            </th>
            <th class="head">
                Tentatives
            </th>
        </tr>
    </thead>
    <tbody>
<?php if(empty($classement)) : ?>
    <tr class="ligne noClassement">
        <td colspan="4">Aucun classement trouvé pour l'instant,</td>
    </tr>
    <tr class="ligne noClassement">
        <td colspan="4">Soyez le premier à réaliser un temps sur <a href="jeu1.php">notre jeu</a> :)</td>
    </tr>
<?php else : ?>
    <?php foreach($classement as $user): ?>
        <tr class="ligne <?= $user->getAttr('id') == $_SESSION['user_connected']->getAttr('id') ? 'you' : ''?>">
            <td><?= $pos ?></td>
            <td><?= $user->getAttr('id') == $_SESSION['user_connected']->getAttr('id') ? htmlspecialchars($user->getAttr("identifiant"))." (vous)" :htmlspecialchars($user->getAttr("identifiant")) ?></td>
            <td><?= convertSecondToMinute(htmlspecialchars($user->getAttr("temps"))) ?></td>
            <td><?= htmlspecialchars($user->getAttr("tentative")) ?></td>
        </tr>
    <?php $pos++; 
    endforeach; ?>
<?php endif;?>
    </tbody>
</table>
