<div id="ordinateur" class="scene" style="flex-direction: column">
    <?php
    $LETTRE = ["","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
    for ($ligne=0; $ligne<10; $ligne++):
    ?>
    <div id="ligne" style="display: flex; flex-direction: row; height: 10vh; width: 100vw">
    <?php
    for ($colonne=0; $colonne<10; $colonne++):
        if ($colonne==0 && $ligne==0) :
            ?>
            <p id="init" colonne="<?=$colonne?>" ligne="<?=$ligne?>" lettre="<?=$LETTRE[$colonne]?>" style="background: #e8eaed; min-width: 9.99vw; width: 9.99vw !important; justify-content: center; display: flex; flex-direction: row; align-items: center;word-wrap:break-word; margin: 0; padding: 0; border: solid black 0.01vh; border-right-width: 0.01vw ;  border-left: none; border-top: none; cursor: pointer">Réinitialiser</p>
        <?php
        elseif ($ligne==0) :
            ?>
            <p id="<?= $LETTRE[$colonne].$ligne?>" colonne="<?=$colonne?>" ligne="<?=$ligne?>" lettre="<?=$LETTRE[$colonne]?>" style="background: #e8eaed; min-width: 9.99vw; width: 9.99vw !important; justify-content: center; display: flex; flex-direction: row; align-items: center;word-wrap:break-word; margin: 0; padding: 0; border: solid black 0.01vh; border-right-width: 0.01vw ;  border-left: none; border-top: none; cursor: pointer"><?= $LETTRE[$colonne]?></p>
        <?php
        elseif ($colonne==0 && $ligne!=0) :
        ?>
        <p id="<?= $LETTRE[$colonne].$ligne?>" colonne="<?=$colonne?>" ligne="<?=$ligne?>" lettre="<?=$LETTRE[$colonne]?>" style="background: #e8eaed; min-width: 9.99vw; width: 9.99vw !important; justify-content: center; display: flex; flex-direction: row; align-items: center;word-wrap:break-word; margin: 0; padding: 0; border: solid black 0.01vh; border-right-width: 0.01vw ;  border-left: none; border-top: none; cursor: pointer"><?=$ligne?></p>

        <?php
            else : ?>
                <input id="<?= $LETTRE[$colonne].$ligne?>" colonne="<?=$colonne?>" ligne="<?=$ligne?>" lettre="<?=$LETTRE[$colonne]?>" style="min-width: 9.99vw; width: 9.99vw !important; justify-content: center; display: flex; flex-direction: row; align-items: center;word-wrap:break-word; margin: 0; padding: 0; border: solid black 0.01vh; border-right-width: 0.01vw ;  border-left: none; border-top: none; cursor: pointer">
            <?php
        endif;
    endfor;
    ?>
    </div>
    <?php
        endfor;
    ?>
    <div class="acces" id="bureauOrdi" style="    position: fixed;
    z-index: 2;
    flex-direction: column;
    bottom: 1vh;
    left: 2vw;
    cursor: pointer;
">
        <img src="View/IMG/retour.png" style="width: 5vw">
        <p>Bureau Ordinateur</p>
    </div>

</div>
