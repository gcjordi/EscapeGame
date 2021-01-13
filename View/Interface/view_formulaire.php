<div id="container_formulairefinal" class="box" style="position: fixed; bottom: 5vh; right:15vw; width: 6vh; height: 6vh; border-radius: 6vh; background: white; display: flex; flex-direction: column; justify-content: space-between; align-items: center; z-index: 9999; padding: 3vh; transition: width 300ms, height 300ms">
    <div id="FF" style="display: none; width: 20vw; height: 20vh">
        <p id="titre_FF" >Vous pensez avoir fini le jeu ?</p>
        <div style="height: 19vh; width: 20vw;">
            <div class="first">
                <p>Les inquiétudes du chef du département informatique sont-elles fondées ?</p>
                <label><input name="radio1a" type="radio" id="idfondees" value="idfondees" />Oui</label>
                <label><input name="radio1a" type="radio" id="idPasfondees" value="idPasfondees" />Non</label>
            </div>
            <div class="second" style="display: none">
                <p>Il y a eu un détournement d’argent ?</p>
                <label><input name="radio2a" type="radio" id="fondeesEtDetournement" value="fondeesEtDetournement" />Oui</label>
                <label><input name="radio2a" type="radio" id="fondeesPasDeDetournement" value="fondeesPasDeDetournement" />Non</label>
            </div>
            <div class="third" style="display: none">
                <p>Le chef du département est vraiment inquiet vous êtes sur ?</p>
                <label><input name="radio3a" type="radio" id="pasFondeesEtSur" value="pasFondeesEtSur" />Oui</label>
                <label><input name="radio3a" type="radio" id="pasFondeesEtPasSur" value="pasFondeesEtPasSur" />Non</label>
            </div>
            <div class="final" style="display: none">
                <p>De combien est le total du nouveau bilan ?</p>
                <input type="text" id="nbr">
                <h4 style="cursor:pointer;">Envoyer</h4>
            </div>
        </div>
    </div>
    <div class="show_formulairefinal" style="width: 6vh; height: 6vh; display: flex; flex-direction: row; justify-content: flex-end; align-items: center; cursor: pointer; transition: width 300ms, height 300ms">
        <img src="https://creazilla-store.fra1.digitaloceanspaces.com/emojis/47298/check-mark-button-emoji-clipart-md.png"
             alt="reponse" style="width: 6vh; height: 6vh;">    </div>
</div>