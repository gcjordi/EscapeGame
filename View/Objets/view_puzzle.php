<style type="text/css">
    #dropZone, #animals {
        display: flex;
        flex-flow: row nowrap;
        justify-content: space-between;
        min-height: 200px;
        margin-bottom: 20px;
    }
    #dropBox1, #dropBox2, #dropBox3, #dropBox4 {
        display: flex;
        flex-flow: column nowrap;
        justify-content: center;
        align-items: center;
        height: 250px;
        width: 250px;
        border: 1px solid #aaaaaa;
        padding: 1rem;
    }
    #puzzle img {
        height: 200px;
        object-fit: cover;
        width: 200px;
    }
</style>
<div id="puzzle" style="display: none;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 10;
    height: 50vh;
    width: 50vw;
    background-color: purple">
    <div id="dropZone">
        <div id="dropBox1" style="position: relative;" class="" ondrop="drop(event)" ondragover="allowDrop(event)">
            <div id="1" style="position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    margin: 0;
    padding: 0;
    height: 100%;
    z-index: 2; "></div>
            <p>Fish</p>
        </div>
        <div id="dropBox2" style="position: relative;"  class="" ondrop="drop(event)" ondragover="allowDrop(event)">
            <div id="2" style="position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    margin: 0;
    padding: 0;
    height: 100%;
    z-index: 2; "></div>
            <p>Mouse</p>
        </div>
        <div id="dropBox3" style="position: relative;"  class="" ondrop="drop(event)" ondragover="allowDrop(event)">
            <div id="3" style="position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    margin: 0;
    padding: 0;
    height: 100%;
    z-index: 2; "></div>
            <p>Cat</p>
        </div>
        <div id="dropBox4" style="position: relative;"  class="" ondrop="drop(event)" ondragover="allowDrop(event)">
            <div id="4" style="position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    margin: 0;
    padding: 0;
    height: 100%;
    z-index: 2; "></div>
            <p>Dog</p>
        </div>
    </div>
    <div id="animals" ondrop="drop(event)" ondragover="allowDrop(event)">
        <img id="cat" class="animals" src="https://www.veterinarypracticenews.com/wp-content/uploads/2019/10/bigstock-Four-Kittens-On-A-White-Backgr-2730282.jpg" draggable="true" ondragstart="drag(event)" width="300"/>
        <img id="dog" class="animals" src="https://www.wallpaperflare.com/static/800/62/574/puppies-white-background-paws-yellow-wallpaper-preview.jpg" draggable="true" ondragstart="drag(event)" width="300"/>
        <img id="mouse" class="animals" src="https://www.adamspestcontrol.com/cms-files/size-992x992/adams-mouse-600x600.jpg" draggable="true" ondragstart="drag(event)" width="300"/>
        <img id="fish" class="animals" src="https://cdn.mos.cms.futurecdn.net/uhLVL2jTdtQ7ScXCeoeAU6-650-80.jpg.webp" draggable="true" ondragstart="drag(event)" width="300"/>
    </div>
</div>
<script type="text/javascript">
    function allowDrop(event) {
        event.preventDefault();
    }
    function drag(event) {
        event.dataTransfer.setData("text", event.target.id);
       
    }
    function drop(event) {
        event.preventDefault();
        var dropBox = event.target.id
        var data = event.dataTransfer.getData("text");

        if($('#dropBox'+dropBox).hasClass("isDrop")){
          
            $("#animals").append($('#dropBox'+dropBox+">img"))
        }
        $('#dropBox'+dropBox).addClass("isDrop")
        
        $("#dropBox"+dropBox).append(document.getElementById(data));
    }
</script>