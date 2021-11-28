
<?php
$style = '<link rel="stylesheet" type="text/css" href="./public/css/login.css">';

 ob_start(); ?>

<div id="content">
    <div id="login">
        <form action="index.php?url=contactAction" method="POST">
            <h2>Me contacter</h2>
        <div>
            <label for="name">Votre nom</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="mail">Votre email</label>
            <input type="mail" name="mail">
        </div>
        <div>
            <label for="message">Votre message</label>
            <input type="textArea" name="message">
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
    
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>