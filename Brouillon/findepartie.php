
<script type="text/javascript" src="formulairefin.js"></script>
<link rel="stylesheet" href="stylefin.css" />

<form>
  <fieldset>
  <legend>Vous pensez avoir fini le jeu ?</legend>
    <div>
        <p>Les inquiétudes du chef du département informatique sont-elles fondées ?</p>
        <input type="checkbox" id="idfondees" name="fondees" value="1"> oui
        <input type="checkbox" id="idPasfondees" name="pas_fondees" value="2"> non    
    </div>
    <div>
    <p>Il y a eu un détournement d’argent ?</p>
        <input type="checkbox"  id="fondeesEtDetournement" name="fondeesEtDetournement" value="1"> oui
        <input type="text" id="otherValue" name="other">
        <input type="checkbox"  id="fondeesPasDeDetournement" name="fondeesPasDeDetournement" value="1"> non
    </div>
    <div>
        <p>Le chef du département est vraiment inquiet vous êtes sur ?</p>
        <input type="checkbox"  id="pasFondeesEtSur" name="pasFondeesEtSur" value="1"> oui
        <input type="checkbox"  id="pasFondeesEtSur" name="pasFondeesEtPasSur" value="1"> non
    </div>
    <div>
    <p>Test</p>
      <input type="checkbox" id="other" name="interest" value="other">
      <label for="other">Autre</label>
      <input type="text" id="otherValue" name="other">
    </div>
  </fieldset>
</form>