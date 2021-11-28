
<?php 
$style = '<link rel="stylesheet" type="text/css" href="./public/css/login.css">';

ob_start(); ?>

<div id='content'>
<?= $e ?>
</div>

<?php $content = ob_get_clean(); ?>




<?php require('template.php'); ?>