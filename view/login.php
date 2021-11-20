<?php ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <title>O'cado</title>
</head>
<body>
    <div id="content">
        <div id="login">
            <form action="">
                <h2>Connection</h2>
                <div>
                    <label for="name">Prenom</label>
                    <input type="text" name="name" required>
                </div>
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
    
</body>
</html>