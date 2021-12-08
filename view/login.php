

<?php
$style = '<link rel="stylesheet" type="text/css" href="./public/css/login.css">';

 ob_start(); ?>

    <div id="content">
    <?php
    if(isset($message)){
        ?>
        <div class="alert fade show alert-dismissible alert-danger w-75 mx-auto my-4" role="alert">
            <?= $message ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php } ?>
        <div id="login">
            <form action="index.php?url=connect" method="POST">
                <h2>Connection</h2>
                <p>Champs obligatoires *</p>
                <div>
                    <label for="name">Prenom</label>
                    <input type="text" name="name" required>*
                </div>
                <div>
                    <label for="login">Utilisateur</label>
                    <input type="text" name="login" required>*
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