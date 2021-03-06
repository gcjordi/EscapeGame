
<div id="affiche_bde" style="display: none;">
  <div id="aff_definitions" style="position: absolute;
      top: 50%;
      left: 50%;
      z-index: 31;
      height: 90%;
      transform: translate(-50%, -50%);
      padding: 12px 30px;
      width: 60vh;
      color:white;">
      <img alt="img" style="width: 60vh; position: absolute;" src="View/IMG/Affiche_BDE_INFO_vide.jpg" id="affiche1" object='<?= json_encode(['id' => 'afficheBde', 'nom' => 'Affiche du BDE', 'img' => "View/IMG/Votre_BDE_INFO_2.jpg", "open" => "affiche_bde", "remove"=>"mini_affiche_bde"]) ?>' ondragstart="drag(event)">
      <div id="def_rep" style="position: absolute;
    top: 47%;
    left: 1vw;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    height: 37%;
    width: 90%;
    padding: 0 20px;">
            <div id="defs" style="display: flex;
    flex-direction: column;max-height: 16vh;
    font-size: 1.3vh;
    max-width: 37vw;
    margin-left: 1vw;"></div>
            <div id="reps" style="display: flex;
    width: 100%;justify-content:space-between; max-width: 37vw"></div>
      </div>
		
</div>
</div>

<div id="affiche_mixte" style="display: none;">
      <div style="
      position: absolute;
      top: 50%;
      left: 50%;
      z-index: 31;
      height: 90%;
      transform: translate(-50%, -50%);
      padding: 12px 30px;
      width: 60vh;
      color:white;">
            <img alt="img" style="width: 60vh; position: absolute;" src="View/IMG/AfficheA4Murs.png" id="affiche2" object='<?= json_encode(['id' => 'afficheMixte', 'nom' => 'Affiche Mixte', 'img' => "View/IMG/AfficheA4Murs.png", "open" => "affiche_mixte", "remove"=>"mini_affiche_mixte"]) ?>' ondragstart="drag(event)">
      </div>
</div>

<div id="affiche_lutte" style="display: none;">
      <div style="
      position: absolute;
      top: 50%;
      left: 50%;
      z-index: 31;
      height: 90%;
      transform: translate(-50%, -50%);
      padding: 12px 30px;
           
      width: 60vh;
      color:white;">
            <img alt="img" style="width: 60vh; position: absolute;" src="View/IMG/affiche_lutte.png" id="affiche3" object='<?= json_encode(['id' => 'afficheLutte', 'nom' => 'Affiche de lutte', 'img' => "View/IMG/affiche_lutte.png", "open" => "affiche_lutte", "remove"=>"mini_affiche_lutte"]) ?>' ondragstart="drag(event)">
      </div>
</div>


<div id="affiche_sensibilisation" style="display: none;">
      <div style="
      position: absolute;
      top: 50%;
      left: 50%;
      z-index: 31;
      height: 90%;
      transform: translate(-50%, -50%);
      padding: 12px 30px;
      width: 60vh;
      color:white;">
            <img alt="img" style="width: 60vh; position: absolute;" src="View/IMG/affiche_sensibilisation.png" id="affiche4" object='<?= json_encode(['id' => 'afficheSensi', 'nom' => 'Affiche de sensibilisation', 'img' => "View/IMG/affiche_sensibilisation.png", "open" => "affiche_sensibilisation", "remove"=>"mini_affiche_sensibilisation"]) ?>' ondragstart="drag(event)">
      </div>
</div>


<div id="compteResultat" style="display: none;">
    <div style="
      position: absolute;
      top: 50%;
      left: 50%;
      z-index: 31;
      height: 38%;
      transform: translate(-50%, -50%);
      padding: 12px 30px;
      background-image: URL('View/IMG/puzzle/comptederesultat.JPG');
      background-size: cover;
      width: 60vh;
      color:white;"></div>
</div>

<div id="affiche_invitation" style="display: none;">
      <div style="
      position: absolute;
      top: 50%;
      left: 50%;
      z-index: 31;
      height: 90%;
      transform: translate(-50%, -50%);
      padding: 12px 30px;
      
      width: 60vh;
      color:white;">
            <img alt="img" style="width: 60vh; position: absolute;" src="View/IMG/affiche_invitation.png" id="affiche5" object='<?= json_encode(['id' => 'afficheInv', 'nom' => 'Affiche invitation', 'img' => "View/IMG/affiche_invitation.png", "open" => "affiche_invitation", "remove"=>"mini_affiche_invitation"]) ?>' ondragstart="drag(event)">
      </div>
</div>

<div id="affiche_coffre" style="display: none;" ondragover="allowDrop(event)">
<div style="
      position: absolute;
      top: 50%;
      left: 50%;
      z-index: 31;
      height: 68%;
      transform: translate(-50%, -50%);
      padding: 12px 30px;
      background-image: URL('View/IMG/coffre.svg');
      background-size: cover;
      width: 61vh;
      color:white;
      ">
      </div>
      <div id="mini_bout_papier" style="
      display: none;
      position: absolute;
      top: 50%;
      left: 50%;
      z-index: 31;
      height: 90%;
      transform: translate(-50%, -50%);
      padding: 12px 30px;
      
      width: 60vh;
      color:white;">
            <img alt="img" style="width: 60vh; position: absolute;" src="View/IMG/bout_papier.png" id="affiche_bout_papier" object='<?= json_encode(['id' => 'affiche_bout_mini', 'nom' => 'Un bout de papier', 'img' => "View/IMG/bout_papier.png", "open" => "bout_papier", "remove"=>"mini_bout_papier"]) ?>' ondragstart="drag(event)">
      </div>
</div>

<div id="violence" style="display: none;">
    <div style="
      position: absolute;
      top: 50%;
      left: 50%;
      z-index: 31;
      height: 90%;
      transform: translate(-50%, -50%);
      padding: 12px 30px;
      width: 60vh;
      color:white;">
            <img alt="img" style="width: 60vh; position: absolute;" src="View/IMG/violence.png" id="affiche6" object='<?= json_encode(['id' => 'afficheViol', 'nom' => 'Affiche contre violence', 'img' => "View/IMG/violence.png", "open" => "violence", "remove"=>"mini_violence"]) ?>' ondragstart="drag(event)">
      </div>
</div>

<div id="violence2" style="display: none;">
    <div style="
      position: absolute;
      top: 50%;
      left: 50%;
      z-index: 31;
      height: 90%;
      transform: translate(-50%, -50%);
      padding: 12px 30px;
      
      width: 60vh;
      color:white;">
            <img alt="img" style="width: 60vh; position: absolute;" src="View/IMG/violence2.png" id="affiche7" object='<?= json_encode(['id' => 'afficheViol2', 'nom' => 'Affiche contre violence', 'img' => "View/IMG/violence2.png", "open" => "violence2", "remove"=>"mini_violence2"]) ?>' ondragstart="drag(event)">
      </div>
</div>

<div id="affiche_releve" style="display: none;">
      <div style="
      position: absolute;
      top: 50%;
      left: 50%;
      z-index: 31;
      height: 90%;
      transform: translate(-50%, -50%);
      padding: 12px 30px;
      
      width: 60vh;
      color:white;">
            <img alt="img" style="width: 60vh; position: absolute;" src="View/IMG/Relev??Vrai.PNG" id="affiche8" object='<?= json_encode(['id' => 'afficheRele', 'nom' => 'Affiche relev?? de compte', 'img' => "View/IMG/Relev??Vrai.PNG", "open" => "affiche_releve", "remove"=>"mini_affiche_releve"]) ?>' ondragstart="drag(event)">
      </div>
</div>

<div id="clef" style="display: none;">
      <div style="
      position: absolute;
      top: 50%;
      left: 50%;
      z-index: 31;
      height: 90%;
      transform: translate(-50%, -50%);
      padding: 12px 30px;
      
      width: 40vh;
      color:white;">
            <img alt="img" style="width: 40vh; position: absolute;" src="View/IMG/inventaire/clef.png" id="affiche_clef" object='<?= json_encode(['id' => 'afficheClef', 'nom' => 'Une cl??', 'img' => "View/IMG/inventaire/clef.png", "open" => "clef", "remove"=>"mini_clef"]) ?>' ondragstart="drag(event)">
      </div>
</div>

<div id="bout_papier" style="display: none;">
      <div style="
      position: absolute;
      top: 50%;
      left: 50%;
      z-index: 31;
      height: 90%;
      transform: translate(-50%, -50%);
      padding: 12px 30px;
      
      width: 60vh;
      color:white;">
            <img alt="img" style="width: 60vh; position: absolute;" src="View/IMG/bout_papier.png" id="affiche_bout_papier" object='<?= json_encode(['id' => 'affiche_bout', 'nom' => 'Un bout de papier', 'img' => "View/IMG/bout_papier.png", "open" => "bout_papier", "remove"=>"mini_bout_papier"]) ?>' ondragstart="drag(event)">
      </div>
</div>

<div id="journal_um" style="display: none;">
      <div style="
      position: absolute;
      top: 50%;
      left: 50%;
      z-index: 31;
      height: 90%;
      transform: translate(-50%, -50%);
      padding: 12px 30px;
           
      width: 60vh;
      color:white;">
            <img alt="img" style="width: 60vh; position: absolute;" src="View/IMG/journal.png" id="affiche10" object='<?= json_encode(['id' => 'afficheUm', 'nom' => 'journal', 'img' => "View/IMG/journal.png", "open" => "journal_um", "remove"=>"mini_journal_um"]) ?>' ondragstart="drag(event)">
      </div>
</div>