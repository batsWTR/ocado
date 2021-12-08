
<?php 
$style = '<link rel="stylesheet" type="text/css" href="./public/css/login.css">';

ob_start(); ?>

<div id='content'>
    <?php 
     if(isset($message) && $message != ''){
        ?>
        <div class="alert fade show alert-dismissible alert-danger w-75 mx-auto my-4" role="alert">
            <?= $message ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php } ?>
    <div>
        <h3>Qu'est-ce que Ocado ?</h3>
        <p>Ocado est un site de liste de cadeaux a partager avec vos proches</p>
        <h3>Comment ca marche ?</h3>
        <ol>
            <li>Creez un compte pour la famille ou les amis</li>
            <li>Donnez le login et le mot de passe a votre groupe</li>
            <li>Chacun se connecte en entrant son prenom</li>
            <li>Remplissez votre liste de souhaits</li>
        </ol>
        <a href="index.php?url=login" class="btn btn-primary">Se connecter</a>
    </div>
    
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>