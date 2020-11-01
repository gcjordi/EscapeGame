<?php foreach ($LIBRAIRIES as $lib) : ?>
    <script type="text/javascript" src="<?= $lib ?>"></script>
<?php endforeach;?>
<?php foreach ($JS as $js) :
    require $js;
endforeach;?>
</body>
</html>
