<div  id="scenarioDebut" style="align-items: center; justify-content: center; background: black; height: 100vh; width: 100vw; display: flex; cursor: pointer">
    <p id="scenario1" style="color: white; max-width: 50vw"></p>
</div>
<script type="text/javascript">
    var phrase = "Jeune informaticien, l'heure est grave ! Alors que tout revient à la normale après des mois de confinement, le chef du département informatique s'inquiète sur la santé financière du Bureau des Etudiants (BDE) Informatique. Vous êtes amenés à vérifier si ces inquiétudes sont fondées ou non. N'attendez plus et plongez dans l'univers de la comptabilité du BDE pour vérifier les choses louches...";
    var lettre = 0;
    var scenario = document.getElementById('scenario1');
    var animationfini = false;

    function scenarioDebut() {
        if(lettre!=phrase.length){
            setTimeout(function () {
                scenario.innerHTML = scenario.innerHTML + "" + phrase.charAt(lettre) + "";
                lettre++;
                scenarioDebut();
            }, 20);
        }
        else {
            animationfini = true;
        }
    }

    $('#scenarioDebut').on('click', function () {
        if(animationfini){
            $(this).fadeOut()
            $('#couloir').css('display', 'flex')
            attente()
        }
    })
</script>