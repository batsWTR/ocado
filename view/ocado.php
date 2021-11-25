<?php 
    session_start();

    if(!$_SESSION['name']){
        header("location:./view/login.php");
    }
?>

<?php ob_start(); ?>

<div id='content'>
    <?php echo 'Hello '.$_SESSION['name']; ?>
</div>

<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>