

<?php ob_start(); ?>

<div id='content'>
    page ocado
</div>

<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>