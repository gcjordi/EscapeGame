


<div id="bureauOrdi" style="background: white; height: 100vh; width: 100vw; display: none">
    <div id="bureauOrdi" style="position: fixed; top: 15vh; height: 70vh; display: flex; flex-direction: column; z-index: 30; justify-content: center; align-items: center">
        <div id="blocnotebde" style="display: flex; flex-direction: column; justify-content: center; align-items: center">
            <img src="View/IMG/blocnotewindows.png" style="width: 10vh; height: 10vh">
            <p>MEMO BDE</p>
        </div>

        <div class="acces" id="ordinateur" style="display: flex; flex-direction: column; justify-content: center; align-items: center">
            <img src="View/IMG/excel.jpg" style="width: 10vh; height: 10vh">
            <p>Bilan Fraudé</p>
        </div>

        <div id="mini-releve" style="display: flex; flex-direction: column; justify-content: center; align-items: center">
            <img src="View/IMG/releveFaux.png" style="width: 10vh; height: 10vh">
            <p>Relevé Bancaire BDE</p>
        </div>
    </div>

    <img id="memobde" style="display: none; width: 40vw; height: 40vh; position: fixed; top: 20vh; right: 20vw; z-index: 30" src="View/IMG/memobde.JPG">
    <img id="big-releve" src="View/IMG/releveFaux.png" style="display: none; width: 40vw; height: 40vh; position: fixed; bottom: 20vh; left: 20vw; z-index: 30">
    <img class="fond" src="View/IMG/windows.jpg">


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

    <script type="text/javascript">
        $('#blocnotebde').on('click', function (e) {
            $('#memobde').css('display', 'block')
        })

        $('#memobde').on('click', function (e) {
            $('#memobde').css('display', 'none')
        })

        $('#mini-releve').on('click', function (e) {
            $('#big-releve').css('display', 'block')
        })

        $('#big-releve').on('click', function (e) {
            $('#big-releve').css('display', 'none')
        })


    </script>


</div>

