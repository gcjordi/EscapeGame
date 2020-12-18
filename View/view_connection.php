<div id="connection" style="background: white; height: 100vh; width: 100vw; display: none">
    <form method="post">
        <p> Bureau du BDE </p> <br>
        <p id="erreur" styles="color:red;" > </p> <br>
        <p>
            <label for="verif_pass" id="passs">Mot de passe :</label>
            <input type = "password" name="vpass" id="vpass"/>
        </p>
        <p>
            <input type="submit" id="valider" />
        </p>
    </form>

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

    <script type="text/javascript"> 
    var mdp_find = false;
    $('#valider').on('click', function(e) {
            e.preventDefault() 
            var pass = "Banque512";
            var vpass = document.getElementById('vpass').value;
            if( pass != vpass ) {
                erreur.innerHTML = "Non tout est une affaire de perte et de clef";
                erreur.style.color = "#f00";
            } else {
                mdp_find = true;
                $('#container').children('#connection').css('display', 'none');
                $('#container').children('#ordinateur').css('display', 'block');
            } 
        } )
    </script> 

</div>

