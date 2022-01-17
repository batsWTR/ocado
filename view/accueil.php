
<?php 
$style = '<link rel="stylesheet" type="text/css" href="./public/css/login.css">';

ob_start(); ?>

<div id='content'>
    <?php 
     if(isset($message) && $message != ''){
        ?>
        <div class="alert fade show alert-dismissible <?= $color ?> w-75 mx-auto my-4" role="alert">
            <?= $message ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php } ?>
    <div>
        <h3 class="fw-bold">Qu'est-ce que Ocado ?</h3>
        <p class="fs-5">Ocado est un site de liste de cadeaux a partager avec vos proches</p>
        <h3>Comment ça marche ?</h3>
        <ol>
            <li class="fw-bolder fs-5">Créez un compte pour la famille ou les amis</li>
            <li class="fw-bolder fs-5">Donnez le login et le mot de passe à votre groupe</li>
            <li class="fw-bolder fs-5">Chacun se connecte en entrant son prénom</li>
            <li class="fw-bolder fs-5">Remplissez votre liste de souhaits</li>
            <li class="fw-bolder fs-5">Participez aux cadeaux des autres membres du groupe</li>
        </ol>
        <a href="index.php?url=login" class="btn btn-primary">Se connecter</a>
    </div>
    
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>