<div class="container_inscription">
    <form method="post">
    <h1>Mon compte</h1>
    <h5> Mes informations : </h5>
        <p> Mon pseudo  : <?=  $_SESSION["user_connected"]->getAttr('identifiant') ?></p>
       
        <?php  $id = htmlspecialchars($_SESSION["user_connected"]->getAttr('identifiant')); ?>
        <a href=""> <!-- lien à faire qui va dans update.php --></a>

    <h5> Mes tentatives : </h5>

    <p>Meilleur temps : <span><?= convertSecondToMinute(Classement::getBestTentative($_SESSION["user_connected"]->getAttr('id'))) ?></span></p>
    <p>Moyenne des temps : <span><?= convertSecondToMinute(Classement::getMoyenneTentative($_SESSION["user_connected"]->getAttr('id'))) ?></span></p>
    <p>Tous mes temps : </p>
    <table>
    	<thead>
    		<tr>
    			<th>Date</th>
    			<th>Temps</th>
    		</tr>
    	</thead>
    	<tbody>
    		<?php foreach($tentatives as $t) : ?>
    			<tr>
    				<td><?= date("d/m/Y H:i:s", strtotime($t->getAttr('date')))?></td>
    				<td><?= htmlspecialchars($t->getAttr('temps'))?></td>
    			</tr>
    		<?php endforeach; ?>
    	</tbody>
    </table>
   
    <a class="register" href="logout.php">Se Déconnecter</a>
    
</div>

