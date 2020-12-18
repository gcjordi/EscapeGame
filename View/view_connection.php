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

    <script type="text/javascript"> 
    var mdp_find = false;
    $('#valider').on('click', function(e) {
            e.preventDefault() 
            var pass = "Banque512";
            var vpass = document.getElementById('vpass').value;
            if( pass != vpass ) { 
                erreur.innerHTML = "Non tout est une affaire de perte et de clef" 
                erreur.style.color = "#f00";
            } else { 
                mdp_find = true;
            } 
        } )
    </script> 

</div>

