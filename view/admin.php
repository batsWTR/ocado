
<?php
$style = '<link rel="stylesheet" type="text/css" href="./public/css/admin.css">';

 ob_start(); ?>

<div id="content">
    <div class="card">
        <h2 class="card-header">Bats</h2>
        <button class="btn btn-danger">Supprimer le compte</button>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require_once('./view/template.php');

