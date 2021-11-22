

<?php ob_start(); ?>

<div id="content">
    <div id="login">
        <form action="index.php?url=createUser" method="POST">
            <h2>Creer un compte</h2>
            <div>
                <label for="login">Utilisateur</label>
                <input type="text" name="login" required>
            </div>
            <div>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Envoyer</button>
        </form>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>