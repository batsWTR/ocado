<?php 
    session_start();

    if(!$_SESSION['name']){
        header("location:./view/login.php");
    }
$style = '<link rel="stylesheet" type="text/css" href="./public/css/ocado.css">';

?>

<?php ob_start(); ?>

<div id='content'>
    <?php 
    foreach($results as $result){?>
    <div class='card'>
        <h4 class="card-header"><?= $result['name'] ?></h4>
        <div class="card-body">
            <h5>Je souhaite:</h5>
            <ul>
                <li>
                    <div>
                        <p>un robot tueur</p><span>75 euros</span>
                    </div>
                </li>
            </ul>
            <h5>Participants:</h5>
            <div>
                <div>
                    <p>bats</p><span>10 euros</span>
                </div>
            </div>
            <?php if($result['isAdmin'] && ($result['name'] == $_SESSION['name'])){ ?>
            <a href="index.php/url=admin" class="btn btn-primary">Admin</a>
            <?php } ?>
        </div>
        
    </div>
    <?php } ?>
</div>

<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>