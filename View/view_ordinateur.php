<div id="ordinateur" style="background: white; flex-direction: column; height: 100vh; width: 100vw; display: none">
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
<script type="text/javascript">
    var excelfini = true;

    $('#B1').css("background", "lightblue");
    $('#C1').css("background", "lightblue");
    $('#D1').css("background", "lightblue");
    $('#E1').css("background", "lightblue");
    $('#B9').css("background", "lightgrey");
    $('#C9').css("background", "lightgrey");
    $('#D9').css("background", "lightgrey");
    $('#E9').css("background", "lightgrey");
    $('#C7').css("background", "orange");
    $('#E7').css("background", "orange");
    $('#E2').css("background", "orange");
    $('#E3').css("background", "orange");

    $('#B1').css("font-weight", "bold");
    $('#C1').css("font-weight", "bold");
    $('#D1').css("font-weight", "bold");
    $('#B2').css("font-weight", "bold");
    $('#B3').css("font-weight", "bold");
    $('#B4').css("font-weight", "bold");
    $('#B5').css("font-weight", "bold");
    $('#B6').css("font-weight", "bold");
    $('#B7').css("font-weight", "bold");
    $('#B8').css("font-weight", "bold");
    $('#D8').css("font-weight", "bold");
    $('#D7').css("font-weight", "bold");
    $('#D6').css("font-weight", "bold");
    $('#D5').css("font-weight", "bold");
    $('#D4').css("font-weight", "bold");
    $('#D3').css("font-weight", "bold");
    $('#D2').css("font-weight", "bold");
    $('#D9').css("font-weight", "bold");
    $('#E9').css("font-weight", "bold");
    $('#C9').css("font-weight", "bold");
    $('#B9').css("font-weight", "bold");

    function init() {
        $('#init').css('background', '#e8eaed')
        document.getElementById("B1").value = "Actif";
        document.getElementById("D1").value = "Passif";
        document.getElementById("B2").value = "Actif Immobilisé";
        document.getElementById("C2").value = "1500";
        document.getElementById("B4").value = "Actif Circulant";
        document.getElementById("B5").value = "Créances";
        document.getElementById("C5").value = "200";
        document.getElementById("B6").value = "Caisse";
        document.getElementById("C6").value = "50";
        document.getElementById("B7").value = "Banque";
        document.getElementById("C7").value = "180";
        document.getElementById("D2").value = "Capitaux Propres";
        document.getElementById("E2").value = "1550";
        document.getElementById("D3").value = "Résultat";
        document.getElementById("E3").value = "80";
        document.getElementById("D5").value = "Passif Circulant";
        document.getElementById("D6").value = "Dettes Fournisseurs";
        document.getElementById("E6").value = "300";
        document.getElementById("D7").value = "Découvert Bancaire";
        document.getElementById("E7").value = "0";
        document.getElementById("B9").value = "Total";
        calculerSomme()
    }

    function calculerSomme(){
        var somme1 = 0;
        var somme2 = 0;
        var lettre=["","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
        for (var ligne=1; ligne<8; ligne++) {
            if (!isNaN(parseInt(document.getElementById(""+lettre[3]+ligne+"").value))){
                somme1 += parseInt(document.getElementById(""+lettre[3]+ligne+"").value);
            }
            if (!isNaN(parseInt(document.getElementById(""+lettre[5]+ligne+"").value))){
                somme2 += parseInt(document.getElementById(""+lettre[5]+ligne+"").value);
            }
        }
        document.getElementById('C9').value = somme1
        document.getElementById('E9').value = somme2
    }

    function verif() {
        if(
            document.getElementById('A1').value == "" &&
            document.getElementById('A2').value == "" &&
            document.getElementById('A3').value == "" &&
            document.getElementById('A4').value == "" &&
            document.getElementById('A5').value == "" &&
            document.getElementById('A6').value == "" &&
            document.getElementById('A7').value == "" &&
            document.getElementById('A8').value == "" &&
            document.getElementById('A9').value == "" &&
            document.getElementById('F1').value == "" &&
            document.getElementById('F2').value == "" &&
            document.getElementById('F3').value == "" &&
            document.getElementById('F4').value == "" &&
            document.getElementById('F5').value == "" &&
            document.getElementById('F6').value == "" &&
            document.getElementById('F7').value == "" &&
            document.getElementById('F8').value == "" &&
            document.getElementById('F9').value == "" &&
            document.getElementById('G1').value == "" &&
            document.getElementById('G2').value == "" &&
            document.getElementById('G5').value == "" &&
            document.getElementById('G6').value == "" &&
            document.getElementById('G7').value == "" &&
            document.getElementById('G8').value == "" &&
            document.getElementById('G9').value == "" &&
            document.getElementById('H1').value == "" &&
            document.getElementById('H2').value == "" &&
            document.getElementById('H3').value == "" &&
            document.getElementById('H4').value == "" &&
            document.getElementById('H5').value == "" &&
            document.getElementById('H6').value == "" &&
            document.getElementById('H7').value == "" &&
            document.getElementById('H8').value == "" &&
            document.getElementById('H9').value == "" &&
            document.getElementById('I1').value == "" &&
            document.getElementById('I2').value == "" &&
            document.getElementById('I3').value == "" &&
            document.getElementById('I4').value == "" &&
            document.getElementById('I5').value == "" &&
            document.getElementById('I6').value == "" &&
            document.getElementById('I7').value == "" &&
            document.getElementById('I8').value == "" &&
            document.getElementById('I9').value == "" &&
            document.getElementById('B1').value == "Actif" &&
            document.getElementById('C1').value == "" &&
            document.getElementById('D1').value == "Passif" &&
            document.getElementById('E1').value == "" &&
            document.getElementById('B2').value == "Actif Immobilisé" &&
            document.getElementById('C2').value == "1500" &&
            document.getElementById('D2').value == "Capitaux Propres" &&
            document.getElementById('E2').value == "1500" &&
            document.getElementById('B3').value == "" &&
            document.getElementById('C3').value == "" &&
            document.getElementById('D3').value == "Résultat" &&
            document.getElementById('E3').value == "-230" &&
            document.getElementById('B4').value == "Actif Circulant" &&
            document.getElementById('C4').value == "" &&
            document.getElementById('D4').value == "" &&
            document.getElementById('E4').value == "" &&
            document.getElementById('B5').value == "Créances" &&
            document.getElementById('C5').value == "200" &&
            document.getElementById('D5').value == "Passif Circulant" &&
            document.getElementById('E5').value == "" &&
            document.getElementById('B6').value == "Caisse" &&
            document.getElementById('C6').value == "50" &&
            document.getElementById('D6').value == "Dettes Fournisseurs" &&
            document.getElementById('E6').value == "300" &&
            document.getElementById('B7').value == "Banque" &&
            document.getElementById('C7').value == "0" &&
            document.getElementById('D7').value == "Découvert Bancaire" &&
            document.getElementById('E7').value == "180" &&
            document.getElementById('B8').value == "" &&
            document.getElementById('C8').value == "" &&
            document.getElementById('D8').value == "" &&
            document.getElementById('E8').value == "" &&
            document.getElementById('B9').value == "Total" &&
            document.getElementById('C9').value == "1750" &&
            document.getElementById('D9').value == "" &&
            document.getElementById('E9').value == "1750"
        ){
            $('#C7').css('background', 'lightgreen');
            $('#E7').css('background', 'lightgreen');
            $('#E2').css("background", "lightgreen");
            $('#E3').css("background", "lightgreen");
            document.querySelectorAll('input').forEach((inp) => {
                inp.setAttribute('disabled', 'disabled')
            })
            excelfini = true;
        }
        else {
            $('#init').css('background', 'pink');
        }
    }

    $('input').on('keyup', function (e){
        console.log($(this)[0].id)
        calculerSomme()
        verif()
    })

    init()

    $('#init').on('click', function (e) {
        var lettre= ["","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"]
        for (var ligne=1; ligne<10; ligne++) {
            for (var colonne=1; colonne<10; colonne++) {
                document.getElementById(""+lettre[colonne]+ligne+"").value = "";
            }
        }
        document.getElementById("G3").value = "Aide: Ceci est un relevé bancaire fraudé, corrigez le...";
        document.getElementById("G4").value = "Aide: Le BDE a une petite mémoire il note tout dans son bloc note...";

        $('#G3').css('font-weight', 'bold')
        init()
    })
</script>