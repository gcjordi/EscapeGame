<div id="puzzle" style="display: none;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 10;
    height: 60vh;
    width: 80vw;
    flex-direction: row;">
    <div id="dragzone">
        <div class="ligne">

        </div>
        <div class="ligne">
            <div id="emppapier1" position="absolute" top="0" left="0" bottom="" right="" ondragover="allowDrop(event)">
                <img id="papier2" src="View/IMG/puzzle/papier2.png" draggable="true" ondragstart="drag(event)"/>
            </div>
            <div id="emppapier2" position="" top="0" left="" bottom="" right="0" ondragover="allowDrop(event)">
                <img id="papier6" src="View/IMG/puzzle/papier6.png" draggable="true" ondragstart="drag(event)"/>
            </div>
        </div>
        <div class="ligne">
            <div id="emppapier3" position="" top="" left="0" bottom="0" right="" ondragover="allowDrop(event)">
                <img id="papier1" src="View/IMG/puzzle/papier1.png" draggable="true" ondragstart="drag(event)">
            </div>
            <div id="emppapier4" position="" top="" left="" bottom="0" right="0" ondragover="allowDrop(event)">
                <img id="papier5" src="View/IMG/puzzle/papier5.png" draggable="true" ondragstart="drag(event)"/>
            </div>
        </div>
        <div class="ligne">
            <div id="emppapier5" position="" top="" left="0" bottom="0" right="" ondragover="allowDrop(event)">
                <img id="papier3" src="View/IMG/puzzle/papier3.png" draggable="true" ondragstart="drag(event)"/>
            </div>
            <div id="emppapier6" position="" top="" left="" bottom="0" right="0" ondragover="allowDrop(event)">
                <img id="papier4" src="View/IMG/puzzle/papier4.png" draggable="true" ondragstart="drag(event)"/>
            </div>
        </div>
    </div>
    <div id="dropZone">
        <div class="ligne" id="puzzle1">
            <img id="papier0" src="View/IMG/puzzle/papier0.png">
        </div>
        <div class="ligne" id="puzzle11">
            <div id="dropBox1" puzzle="papier1" class="dropBox" position="absolute" top="0" left="0" bottom="" right="" ondragover="allowDrop(event)">
            </div>
            <div id="dropBox2" puzzle="papier2" class="dropBox" position="absolute" top="0" left="" bottom="" right="0" ondragover="allowDrop(event)">
            </div>
        </div>
        <div class="ligne" id="puzzle2">
            <div id="dropBox3" puzzle="papier3" class="dropBox" position="absolute" top="" left="0" bottom="" right="" ondragover="allowDrop(event)">
            </div>
            <div id="dropBox4" puzzle="papier4" class="dropBox" position="absolute" top="" left="0" bottom="" right="" ondragover="allowDrop(event)">
            </div>
        </div>
        <div class="ligne" id="puzzle3">
            <div id="dropBox5" puzzle="papier5" class="dropBox" position="absolute" top="" left="0" bottom="0" right="" ondragover="allowDrop(event)">
            </div>
            <div id="dropBox6" puzzle="papier6" class="dropBox" position="absolute" top="" left="" bottom="0" right="0" ondragover="allowDrop(event)">
            </div>
        </div>
    </div>
</div>
<div id="puzzlefini" class="itemInventaire" style="display: none; position: fixed; top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 12;"><img style="width: 50vw; height: 50vh" src="View/IMG/puzzle/comptederesultat.JPG" id="compteResultat2" object='<?= json_encode(['id' => 'compte', 'nom' => 'compte resultat', 'img' => "View/IMG/puzzle/comptederesultat.JPG", "open" => "compteResultat", "remove" => "puzzlefini"]) ?>' ondragstart="drag(event)">
</div>

