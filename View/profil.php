<div class="container_inscription">
    <form method="post">
    <h1><?= $isUserConnected ? 'Mon compte' : 'Compte de '.$user_profil->getAttr('identifiant') ?></h1>
    <h3><?= $isUserConnected ? 'Mes' : 'Ses'?> informations : </h3>
        <p> <?= $isUserConnected ? 'Mon' : 'Son'?> pseudo  : <?=  $user_profil->getAttr('identifiant') ?></p>
       
        <?php  $id = htmlspecialchars($user_profil->getAttr('identifiant')); ?>
        <a href=""> <!-- lien à faire qui va dans update.php --></a>

    <h3> <?= $isUserConnected ? 'Mes' : 'Ses'?> tentatives : </h3>
    <?php if(!empty($tentatives)) : ?>

        <p>Meilleur temps : <span><?= convertSecondToMinute(Classement::getBestTentative($user_profil->getAttr('id'))) ?></span></p>
        <p>Moyenne des temps : <span><?= convertSecondToMinute(Classement::getMoyenneTentative($user_profil->getAttr('id'))) ?></span></p>
        <h4>Tous <?= $isUserConnected ? 'mes' : 'ses'?> temps : </h4>
        <table style="width: 100%">
        	<thead style="background-color: #ff5660">
        		<tr>
        			<th>Date</th>
        			<th>Temps</th>
        		</tr>
        	</thead>
        	<tbody>
        		<?php foreach($tentatives as $t) : ?>
        			<tr <?= count($tentatives) == 1 ? 'id="one"' : ''?> class="ligne profil <?= $isUserConnected ? 'you' : '' ?> "> 
        				<td class="date"><?= date("d/m/Y H:i:s", strtotime($t->getAttr('date')))?></td>
        				<td class="second"><?= convertSecondToMinute(htmlspecialchars($t->getAttr('temps')))?></td>
        			</tr>
        		<?php endforeach; ?>
        	</tbody>
        </table>
    <?php else : ?>
        <?php if($isUserConnected) : ?>
            <p>Aucun temps enregistré pour le moment, commence dès à présent sur <a style="color: #FF5660; text-decoration: underline;" href="jeu1.php">notre jeu</a>.</p>
            
        <?php else : ?>
            <p>Cet utilisateur n'a pas encore réalisé de tentative</p>
        <?php endif; ?>
    <?php endif;?>
    <?php if($isUserConnected) : ?>
        <a class="register" href="logout.php">Se Déconnecter</a>
    <?php endif;?>
    </form>
</div>

