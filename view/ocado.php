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
        <h4><?= $result['name'] ?></h4>
        <h5>Je souhaite:</h5>
        <ul>
            
        </ul>
        <?php if($result['isAdmin'] && ($result['name'] == $_SESSION['name'])){ ?>
            <button class="btn btn-primary">Admin</button>
            <?php } ?>
    </div>
    <?php } ?>
</div>

<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>