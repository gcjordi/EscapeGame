<div id="connection" style="background: white; height: 100vh; width: 100vw">
    <form method="post">
        <p> Bureau du BDE </p> <br>
        <p id="erreur" styles="color:red;" > </p> <br>
        <p>
            <label for="verif_pass" id="passs">Mot de passe :</label>
            <input type = "password" name="vpass" id="vpass" onchange="passverif()"/>
        </p>
        <p>
            <input type="submit" />
        </p>
    </form>

    <script type="text/javascript"> 
        function passverif() {
            var pass = "Banque512";
            var vpass = document.getElementById('vpass').value;
            if( pass != vpass ) { 
                erreur.innerHTML = "Non tout est une affaire de perte et de clef" 
                erreur.style.color = "#f00";
            } else { 
                document.getElementById('passs').style.color = "#0f0"; 
            } 
        } 
    </script> 

</div>

