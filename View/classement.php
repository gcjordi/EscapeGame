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
                Meilleur temps
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
        <tr class="ligne <?= isset($_SESSION['user_connected']) && $user->getAttr('id') == $_SESSION['user_connected']->getAttr('id') ? 'you' : ''?>">
            <td><?= $pos==1 ? "<span id='couronne'><img src='View/IMG/couronne.png'></span>" : "" ?><span><?= $pos ?></span></td>
            <td><a href="profil.php?ident=<?= rawurlencode($user->getAttr("identifiant")) ?>"><?= isset($_SESSION['user_connected']) && $user->getAttr('id') == $_SESSION['user_connected']->getAttr('id') ? htmlspecialchars($user->getAttr("identifiant"))." (vous)" :htmlspecialchars($user->getAttr("identifiant")) ?></a></td>
            <td><?= convertSecondToMinute(htmlspecialchars(Classement::getBestTentative($user->getAttr('id')))) ?></td>
            <td><?= htmlspecialchars($user->getAttr("tentative")) ?></td>
        </tr>
    <?php $pos++; 
    endforeach; ?>
<?php endif;?>
    </tbody>
</table>
<!-- <a href='https://fr.pngtree.com/so/clipart-couronne'>clipart couronne png de fr.pngtree.com</a> -->