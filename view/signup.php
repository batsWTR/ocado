

<?php ob_start(); ?>

<div id="content">
    <?php
    if(isset($message)){
        ?>
        <div class="alert alert-danger w-75 mx-auto my-4" role="alert">
            <?= $message ?>
        </div>
    <?php } ?>
    
    <div id="login">
        <form action="index.php?url=createUser" method="POST">
            <h2>Creer un compte</h2>
            <div>
                <label for="name">Votre prenom</label>
            <input type="text" name="name" >
            </div>
            <div>
                <label for="login">Utilisateur</label>
                <input type="text" name="login" >
            </div>
            <div>
                <label for="mail">Votre email</label>
                <input type="email" name="mail" >
            </div>
            <div>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" >
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php ob_start(); ?>
    



<?php require('template.php'); ?>