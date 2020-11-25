<div id="puzzle" style="display: none;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 10;
    height: 50vh;
    width: 50vw;
    background-color: purple">
    <div draggable="true" ondragstart="start(event)" ondragend="end(event)" ondrag="drag(event)">
        drag
    </div>
</div>
<script type="text/javascript">
    function start(event) {
        console.log("AHHHH !! Qui m'attrape ? Lachez moi !!")
        console.log(event)
    }

    function end(event) {
        console.log("Il s'en ai fallu de peu !")
        console.log(event)
    }
    function drag(event) {
        console.log("AAAHHHHH !!!! AU SECOURS !! Je vais vomir :(")
    }
</script>