<div id="container_classement">
<div class="ligne ligne1">
    <div class="col-2">
    </div>
    <div class="col-5">
        <p>Pseudo</p>
    </div>
    <div class="col-5">
        <p>Score</p>
    </div>
</div>
    <div class="container_classement">
<?php for ($ligne=1; $ligne<=100; $ligne++): ?>
    <div class="ligne">
        <div class="col-2">
            <p><?= $ligne ?></p>
        </div>
        <div class="col-5">
            <p>Pseudo</p>
        </div>
        <div class="col-5">
            <p>Score</p>
        </div>
    </div>
<?php endfor; ?>
    </div>
</div>
