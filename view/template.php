
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--- font awesome --->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <!--- bootstrap 5 --->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" defer></script>

    <link rel="stylesheet" type="text/css" href="./public/css/style.css">
    <?= $style ?>
    <title>O'cado</title>
</head>
<body>
    <header>
        <div class="logo"><a href="index.php"><img src="./public/images/gift.png" alt="logo"></a></div>
        <div>O'cado</div>
        <nav>
            <ul>
                
                <?php
                if(!$_SESSION['name']){ ?>
                <li><a href="index.php?url=login">Connection</a></li>
                <?php }else{ ?>
                    <li><?= $_SESSION['name']?></li>
                    <li><a href="index.php?url=disconnect">Deconnection</a></li>

                <?php } ?>
                <li><a href="index.php?url=contact"><i class="fas fa-question"></i></a></li>
            </ul>
        </nav>
    </header>
    <?= $content ?> 
</body>
</html>