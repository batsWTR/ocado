
<?php ob_start(); ?>

<div id='content'>
    page accueil
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>