
<!--
    <script type="text/javascript" src="formulairefin.js"></script> -->
<link rel="stylesheet" href="stylefin.css" />

<form>
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
    <label><input name="radio2a" type="radio" id="other" value="fondeesEtDetournement" />Oui</label>
    <label><input name="radio2a" type="radio" id="fondeesPasDeDetournement" value="fondeesPasDeDetournement" />Non</label>
       
      <!--  <input type="checkbox" id="other" name="fondeesEtDetournement" value="other"> oui
        <input type="checkbox"  id="fondeesPasDeDetournement" name="fondeesPasDeDetournement" value="1"> non--> 
        <br>
        <input type="text" id="otherValue" name="other"> 
    </div>
    <div id="non">
        <p>Le chef du département est vraiment inquiet vous êtes sur ?</p>
        <input type="checkbox"  id="pasFondeesEtSur" name="pasFondeesEtSur" value="1">
        <label for="pasFondeesEtSur">oui</label>
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