

<?php
$style = '<link rel="stylesheet" type="text/css" href="./public/css/login.css">';

 ob_start(); ?>

<div id="content">
    <?php
    if(isset($message)){
        ?>
        <div class="alert fade show alert-dismissible alert-nok w-75 mx-auto my-4" role="alert">
            <?= $message ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php } ?>
    
    <div id="login">
        <form action="index.php?url=createUser" method="POST">
            <h2>Creer un compte</h2>
            <p>Champs obligatoires *</p>
            <div>
                <label for="name">Votre prenom</label>
            <input type="text" name="name" required>*
            </div>
            <div>
                <label for="login">Utilisateur</label>
                <input type="text" name="login" required>*
            </div>
            <div>
                <label for="mail">Votre email</label>
                <input type="email" name="mail" required>*
            </div>
            <div>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" required>*
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
</div>


<?php $content = ob_get_clean(); ?>


    



<?php require('template.php'); ?>