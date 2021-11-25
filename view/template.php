
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--- bootstrap 5 --->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" defer></script>

    <link rel="stylesheet" type="text/css" href="./public/css/style.css">
    <link rel="stylesheet" type="text/css" href="./public/css/login.css">
    <title>O'cado</title>
</head>
<body>
    <header>
        <div class="logo"><a href="index.php">logo</a></div>
        <div>O'cado</div>
        <nav>
            <ul>
                
                <li><a href="index.php?url=disconnect">Deconnection</a></li>
                <?php
                if(!$_SESSION['name']){ ?>
                <li><a href="index.php?url=login">Se connecter</a></li>
                <li><a href="index.php?url=signup">S'enregistrer</a></li>
                <?php } ?>
                <li><a href="index.php?url=contact">?</a></li>
            </ul>
        </nav>
    </header>
    <?= $content ?> 
</body>
</html>