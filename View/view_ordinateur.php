<div id="ordinateur" style="background: white; height: 100vh; width: 100vw; display: none">
    <?php
    $LETTRE = ["","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
    for ($ligne=0; $ligne<10; $ligne++):
    ?>
    <div id="ligne" style="display: flex; flex-direction: row;">
    <?php
    for ($colonne=0; $colonne<10; $colonne++):
    ?>
        <?php
        if ($colonne==0 && $ligne==0) :
            ?>
            <p id="init" colonne="<?=$colonne?>" ligne="<?=$ligne?>" lettre="<?=$LETTRE[$colonne]?>" style="background: #e8eaed; height: 9.99vh !important; min-width: 9.99vw; width: 9.99vw !important; justify-content: center; display: flex; flex-direction: row; align-items: center;word-wrap:break-word; margin: 0; padding: 0; border: solid black 0.01em; border-left: none; border-top: none; cursor: pointer">Réinitialiser</p>
        <?php
        elseif ($ligne==0) :
            ?>
            <p id="<?= $LETTRE[$colonne].$ligne?>" colonne="<?=$colonne?>" ligne="<?=$ligne?>" lettre="<?=$LETTRE[$colonne]?>" style=" background: #e8eaed; height: 9.99vh !important; min-width: 9.99vw; width: 9.99vw !important; justify-content: center; display: flex; flex-direction: row; align-items: center;word-wrap:break-word; margin: 0; padding: 0; border: solid black 0.01em; border-left: none; border-top: none"><?= $LETTRE[$colonne]?></p>
        <?php
        elseif ($colonne==0 && $ligne!=0) :
        ?>
        <p id="<?= $LETTRE[$colonne].$ligne?>" colonne="<?=$colonne?>" ligne="<?=$ligne?>" lettre="<?=$LETTRE[$colonne]?>" style="background: #e8eaed; height: 9.99vh !important; min-width: 9.99vw; width: 9.99vw !important; justify-content: center; display: flex; flex-direction: row; align-items: center;word-wrap:break-word; margin: 0; padding: 0; border: solid black 0.01em; border-left: none; border-top: none"><?=$ligne?></p>

        <?php
            else : ?>
                <input id="<?= $LETTRE[$colonne].$ligne?>" colonne="<?=$colonne?>" ligne="<?=$ligne?>" lettre="<?=$LETTRE[$colonne]?>" style="height: 9.99vh !important; min-width: 9.99vw; width: 9.99vw !important; margin: 0; padding: 0; border: solid black 0.01em; border-left: none; border-top: none">
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
<script type="text/javascript">

    $('#A1').css("background", "lightblue");
    $('#A3').css("background", "lightblue");
    $('#A4').css("background", "lightblue");
    $('#A6').css("background", "lightblue");
    $('#C1').css("background", "yellowgreen");
    $('#D1').css("background", "yellowgreen");
    $('#C6').css("background", "lightgrey");
    $('#D6').css("background", "lightgrey");

    $('#A1').css("font-weight", "bold");
    $('#A3').css("font-weight", "bold");
    $('#A4').css("font-weight", "bold");
    $('#A6').css("font-weight", "bold");
    $('#C1').css("font-weight", "bold");
    $('#D1').css("font-weight", "bold");
    $('#C6').css("font-weight", "bold");
    $('#D6').css("font-weight", "bold");

    function init() {
        document.getElementById("A1").value = "Journal";
        document.getElementById("C1").value = "Actif";
        document.getElementById("D1").value = "Passif";
        document.getElementById("A3").value = "Banque";
        document.getElementById("A4").value = "Capital";
        document.getElementById("C3").value = "2300";
        document.getElementById("D4").value = "3000000";
        document.getElementById("A6").value = "Total";
        document.getElementById("C6").value = "2300";
        document.getElementById("D6").value = "3000000";
    }

    init()

    $('#init').on('click', function (e) {
        var lettre= ["","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"]
        for (var ligne=1; ligne<10; ligne++) {
            for (var colonne=1; colonne<10; colonne++) {
                document.getElementById(""+lettre[colonne]+ligne+"").value = "";
            }
        }
        init()
    })
</script>