

<form action="javascript:verif()">
  <fieldset>
  <legend>Vous pensez avoir fini le jeu ?</legend>
       <div>
        <p>Les inquiétudes du chef du département informatique sont-elles fondées ?</p>
        <label><input name="radio1a" type="radio" id="idfondees" value="idfondees" />Oui</label>
        <label><input name="radio1a" type="radio" id="idPasfondees" value="idPasfondees" />Non</label>
        <!--
        <input type="radio" id="idfondees" name="idfondees" value="idfondees">
        <label for="idfondees">oui</label>
        <input type="radio" id="idPasfondees" name="pas_fondees" value="idPasfondees">  
        <label for="idPasfondees">non</label>   -->
        </div>
    <div id="oui">
    <p>Il y a eu un détournement d’argent ?</p>
    <label><input name="radio2a" type="radio" id="fondeesEtDetournement" value="fondeesEtDetournement" />Oui</label>
    <label><input name="radio2a" type="radio" id="fondeesPasDeDetournement" value="fondeesPasDeDetournement" />Non</label>
    </div>
    <div id="non">
        <p>Le chef du département est vraiment inquiet vous êtes sur ?</p>
        <label><input name="radio3a" type="radio" id="pasFondeesEtSur" value="pasFondeesEtSur" />Oui</label>
        <label><input name="radio3a" type="radio" id="pasFondeesEtPasSur" value="pasFondeesEtPasSur" />Non</label>
        
    </div>
    <div id="ouioui">
        <p>De combien pensez-vous est le détournement (100) ?</p>
        <input type="text" id="nbr">
    </div>
    <div>
    <input type="submit" value="Valider">
    <span id="msg" style="color:red"></span>
    </div>
  </fieldset>
</form>

<link rel="stylesheet" href="stylefin.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="formulairefin.js"></script>
