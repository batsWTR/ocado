
<?php
$style = '<link rel="stylesheet" type="text/css" href="./public/css/admin.css">';

 ob_start(); ?>

<div id="content">
    <div class="card">
        <h2 class="card-header">Bats</h2>
        <button class="btn btn-danger" data-bs-toggle='modal' data-bs-target='#modalSuppr'>Supprimer le compte</button>
    </div>
</div>
<div class="modal fade" id='modalSuppr'>
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Supprimez votre compte</h5>
            <button type='button' class='btn-clos' data-bs-dismiss='modal'></button>
        </div>
        <div class="modal-body">
            <p>Attention si vous supprimez votre compte, ceci supprimera tous les utilisateurs lies a ce compte</p>
        </div>
        <div class="modal-footer">
            <form action="index.php?url=deleteUser" method="POST">
                <button type='submit' class="btn btn-danger">Supprimer</button>
            </form>
            <button type='button' class="btn" data-bs-dismiss='modal'>Annuler</button>
        </div>
        </div>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require_once('./view/template.php');

