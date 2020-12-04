<style type="text/css">
    #dragzone, #dropZone {
        display: flex;
        flex-direction: column;
        height: 80vh;
        width: 40vw;
    }
    .ligne {
        display: flex;
        flex-direction: row;
        height: 40vh;
        width: 40vw;
    }
    #dropBox1, #dropBox2, #dropBox3, #dropBox4 {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 40vh;
        width: 20vw;
        position: relative;
    }
    #puzzle img {
        height: 40vh;
        width: 20vw;
    }
    #puzzle img#dog {
    }
    #dragzone .ligne div {
        height: 40vh;
        width: 20vw;
    }
</style>
<div id="puzzle" style="display: none;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 10;
    height: 80vh;
    width: 80vw;
    flex-direction: row;
    background-color: purple">
    <div id="dragzone">
        <div class="ligne">
            <div id="papier1" position="" top="" left="" bottom="" right="" ondragover="allowDrop(event)">
                <img id="cat" src="https://www.veterinarypracticenews.com/wp-content/uploads/2019/10/bigstock-Four-Kittens-On-A-White-Backgr-2730282.jpg" draggable="true" ondragstart="drag(event)" width="300"/>
            </div>
            <div id="papier2" position="" top="" left="" bottom="" right="" ondragover="allowDrop(event)">
                <img id="dog" src="https://www.wallpaperflare.com/static/800/62/574/puppies-white-background-paws-yellow-wallpaper-preview.jpg" draggable="true" ondragstart="drag(event)" width="300"/>
            </div>
        </div>
        <div class="ligne">
            <div id="papier3" position="" top="" left="" bottom="" right="" ondragover="allowDrop(event)">
                <img id="mouse" src="https://www.adamspestcontrol.com/cms-files/size-992x992/adams-mouse-600x600.jpg" draggable="true" ondragstart="drag(event)" width="300"/>
            </div>
            <div id="papier4" position="" top="" left="" bottom="" right="" ondragover="allowDrop(event)">
                <img id="fish" src="https://cdn.mos.cms.futurecdn.net/uhLVL2jTdtQ7ScXCeoeAU6-650-80.jpg.webp" draggable="true" ondragstart="drag(event)" width="300"/>
            </div>
        </div>
    </div>
    <div id="dropZone">
        <div class="ligne">
            <div id="dropBox1" puzzle="cat" class="dropBox" position="absolute" top="0" left="0" bottom="" right="" ondragover="allowDrop(event)">
            </div>
            <div id="dropBox2" puzzle="dog" class="dropBox" position="absolute" top="0" left="" bottom="" right="0" ondragover="allowDrop(event)">
            </div>
        </div>
        <div class="ligne">
            <div id="dropBox3" puzzle="mouse" class="dropBox" position="absolute" top="" left="0" bottom="0" right="" ondragover="allowDrop(event)">
            </div>
            <div id="dropBox4" puzzle="fish" class="dropBox" position="absolute" top="" left="" bottom="0" right="0" ondragover="allowDrop(event)">
            </div>
        </div>
    </div>
    <p style="display: none; position: fixed; top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 12;">PUZZLE TERMINE</p>
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
            if($("#dropBox1").attr("puzzle")==$("#dropBox1").children("img").attr("id")&&$("#dropBox2").attr("puzzle")==$("#dropBox2").children("img").attr("id")&&$("#dropBox3").attr("puzzle")==$("#dropBox3").children("img").attr("id")&&$("#dropBox4").attr("puzzle")==$("#dropBox4").children("img").attr("id")){
                fini = true;
                $("#puzzle").children("p").css("display", "block");
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
    document.getElementById("papier1").ondrop = function(event){
        dropping($(this), event);
    };
    document.getElementById("papier2").ondrop = function(event){
        dropping($(this), event);
    };
    document.getElementById("papier3").ondrop = function(event){
        dropping($(this), event);
    };
    document.getElementById("papier4").ondrop = function(event){
        dropping($(this), event);
    };

    function plein(actual) {
        return actual.children("img").length!==0;
    }
</script>