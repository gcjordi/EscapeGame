<div id="connection" class="scene">
    <img class="fond" src="View/IMG/windows.jpg">
    <form method="post" style="z-index: 30; display: flex; flex-direction: column; justify-content: center; align-items: center">
        <p> Bureau du BDE </p>
        <p id="erreur" styles="color:red;" > </p>
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
</div>

