
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--- font awesome --->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <!--- bootstrap 5 --->
    <link href="./public/css/bs/bootstrap.min.css" rel="stylesheet">
    <script src="./public/js/bs/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" defer></script>

    <link rel="stylesheet" type="text/css" href="./public/css/style.css">
    <?= $style ?>
    <title>O'cado</title>
</head>
<body>
    <header class="navbar navbar-expand-md">

            <div class="logo navbar-brand ms-2"><a href="index.php"><img src="./public/images/gift.png" title="Accueil" alt="logo"><p class="mb-0">Accueil</p></a></div>
            <h1 class="ms-3">O'cado</h1>
            <button class='navbar-toggler' data-bs-toggle='collapse' data-bs-target='#menu'>Menu</button>

        
        <nav id='menu' class="collapse navbar-collapse navbar-right justify-content-end me-3 fs-5">
            <ul class="navbar-nav">  
                <?php
                if(!$_SESSION['name']){ ?>
                <li class="nav-item"><a href="index.php?url=signup">Creer un compte</a></li>
                <?php }else{ ?>
                    <li class="nav-item">Bonjour <?= ucfirst($_SESSION['name'])?></li>
                    <li class="nav-item"><a href="index.php?url=disconnect">Deconnexion</a></li>

                <?php } ?>
                <li class="nav-item"><a href="index.php?url=contact"><i title='Contact' class="fas fa-question"></i></a></li>
            </ul>
        </nav>
    </header>
    <?= $content ?> 
</body>
</html>