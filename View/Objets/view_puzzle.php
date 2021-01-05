<style type="text/css">
    #dragzone, #dropZone {
        display: flex;
        flex-direction: column;
        height: 60vh;
        width: 40vw;
        position: relative;
    }
    .ligne {
        display: flex;
        flex-direction: row;
        height: 20vh;
        width: 40vw;
    }
    #puzzle1 {
        position: absolute;
        top: 0;
        background: lightgrey;
        border: solid black 1px;
        border-bottom: none;
    }
    #puzzle11 {
        position: absolute;
        top: 10vh;
        background: lightgrey;
        border: solid black 1px;
        border-top: none;
        border-bottom: none;
    }
    #puzzle2 {
        position: absolute;
        top: 23vh;
        background: lightgrey;
        border: solid black 1px;
        border-top: none;
        border-bottom: none;
    }
    #puzzle3 {
        position: absolute;
        top: 35vh;
        background: lightgrey;
        border: solid black 1px;
        border-top: none;
    }
    #puzzle #papier6 {
        height: 15vh;
        width: 20vw;
    }
    .dropBox {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 20vh;
        width: 20vw;
        position: relative;
    }
    #puzzle img {
        height: 20vh;
        width: 20vw;
    }
    #puzzle #puzzle1, #puzzle #puzzle3 {
        width: 40vw;
        height: 10vh;
    }
    #puzzle #papier5, #puzzle #dropBox5, #puzzle #dropBox6 {
        width: 20vw;
        height: 10vh;
    }
    #puzzle #papier0 {
        height: 100%;
        width: 100%;
    }
    #puzzle #dropBox3 {
        height: 13vh;
    }
    #puzzle #dropBox4 {
        height: 8vh;
    }
    #dragzone .ligne div {
        height: 20vh;
        width: 20vw;
    }
</style>
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
<script type="text/javascript">
    function allowDrop(event) {
        event.preventDefault();
    }
    function drag(event) {
        event.dataTransfer.setData("text", event.target.id);
    }

    var fini = false;

    function dropping(actual, event) {
        if (!plein(actual) && !fini) {
            event.preventDefault();
            var data = event.dataTransfer.getData("text");
            event.target.appendChild(document.getElementById(data));
            var position = {
                position : actual.attr("position"),
                top : actual.attr("top"),
                bottom : actual.attr("bottom"),
                left : actual.attr("left"),
                right : actual.attr("right"),
            }
            for(key in position) {
                actual.children("img").css(key, position[key]);
            }
            if($("#dropBox1").attr("puzzle")==$("#dropBox1").children("img").attr("id")&&$("#dropBox2").attr("puzzle")==$("#dropBox2").children("img").attr("id")&&$("#dropBox3").attr("puzzle")==$("#dropBox3").children("img").attr("id")&&$("#dropBox4").attr("puzzle")==$("#dropBox4").children("img").attr("id")&&$("#dropBox5").attr("puzzle")==$("#dropBox5").children("img").attr("id")&&$("#dropBox6").attr("puzzle")==$("#dropBox6").children("img").attr("id")){
                fini = true;
                $('#puzzle').css('display', 'none')
                $("#puzzlefini").css("display", "block");
            }
        }
    }

    document.getElementById("dropBox1").ondrop = function(event){
        dropping($(this), event);
    };
    document.getElementById("dropBox2").ondrop = function(event){
        dropping($(this), event);
    };
    document.getElementById("dropBox3").ondrop = function(event){
        dropping($(this), event);
    };
    document.getElementById("dropBox4").ondrop = function(event){
        dropping($(this), event);
    };
    document.getElementById("dropBox5").ondrop = function(event){
        dropping($(this), event);
    };
    document.getElementById("dropBox6").ondrop = function(event){
        dropping($(this), event);
    };
    document.getElementById("emppapier1").ondrop = function(event){
        dropping($(this), event);
    };
    document.getElementById("emppapier2").ondrop = function(event){
        dropping($(this), event);
    };
    document.getElementById("emppapier3").ondrop = function(event){
        dropping($(this), event);
    };
    document.getElementById("emppapier4").ondrop = function(event){
        dropping($(this), event);
    };
    document.getElementById("emppapier5").ondrop = function(event){
        dropping($(this), event);
    };
    document.getElementById("emppapier6").ondrop = function(event){
        dropping($(this), event);
    };

    function plein(actual) {
        return actual.children("img").length!==0;
    }
</script>