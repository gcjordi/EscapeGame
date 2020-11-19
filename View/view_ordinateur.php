<div id="ordinateur" style="background: white; height: 100vh; width: 100vw;">
    <?php
    $LETTRE = ["","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
    for ($ligne=0; $ligne<10; $ligne++):
    ?>
    <div id="ligne" style="display: flex; flex-direction: row;">
    <?php
    for ($colonne=0; $colonne<10; $colonne++):
        if ($ligne==0) :
    ?>
    <p id="<?= $LETTRE[$colonne].$ligne?>" colonne="<?=$colonne?>" ligne="<?=$ligne?>" lettre="<?=$LETTRE[$colonne]?>" style=" background: #e8eaed; height: 9.99vh !important; min-width: 9.99vw; width: 9.99vw !important; justify-content: center; display: flex; flex-direction: row; align-items: center;word-wrap:break-word; margin: 0; padding: 0; border: solid black 0.01em; border-left: none; border-top: none"><?= $LETTRE[$colonne]?></p>
        <?php
        elseif ($colonne==0 && $ligne!=0) :
        ?>
        <p id="<?= $LETTRE[$colonne].$ligne?>" colonne="<?=$colonne?>" ligne="<?=$ligne?>" lettre="<?=$LETTRE[$colonne]?>" style="background: #e8eaed; height: 9.99vh !important; min-width: 9.99vw; width: 9.99vw !important; justify-content: center; display: flex; flex-direction: row; align-items: center;word-wrap:break-word; margin: 0; padding: 0; border: solid black 0.01em; border-left: none; border-top: none"><?=$ligne?></p>
        <?php
            else : ?>
                <p id="<?= $LETTRE[$colonne].$ligne?>" colonne="<?=$colonne?>" ligne="<?=$ligne?>" lettre="<?=$LETTRE[$colonne]?>" style="height: 9.99vh !important; min-width: 9.99vw; width: 9.99vw !important; justify-content: center; display: flex; flex-direction: row; align-items: center;word-wrap:break-word; margin: 0; padding: 0; border: solid black 0.01em; border-left: none; border-top: none"><input id="<?= $LETTRE[$colonne].$ligne?>" colonne="<?=$colonne?>" ligne="<?=$ligne?>" lettre="<?=$LETTRE[$colonne]?>" type="text" style="border:none; height: 9.99vh; width: 9.99vw"></p>
            <?php
        endif;
    endfor;
    ?>
    </div>
    <?php
        endfor;
    ?>
    <div class="acces" id="bureauBDE" style="    position: fixed;
    z-index: 2;
    flex-direction: column;
    bottom: 1vh;
    left: 2vw;
    cursor: pointer;
">
        <img src="View/IMG/retour.png" style="width: 5vw">
        <p>Bureau du BDE</p>
    </div>
</div>
