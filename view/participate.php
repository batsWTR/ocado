

<?php
$style = '<link rel="stylesheet" type="text/css" href="./public/css/participate.css">';

 ob_start(); ?>

    <div id="content">
    <?php
    if(isset($message)){
        ?>
        <div class="alert fade show alert-dismissible alert-danger w-75 mx-auto my-4" role="alert">
            <?= $message ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php } ?>
        <div class="card">
            <h5 class="card-header"><?= $card[0]['name'] ?></h5>
            <div class="card-body">
                <form id="formParticipate" action="index.php?url=participateAction" method="POST">
                    <ul>
                    <?php foreach($card as $gift){
                        if($gift['description'] != ''){
                            echo '<li>'.$gift['description'].' '.$gift['giftId'].'</li>';
                        }
                    } ?>
                    </ul>
                    <input type="hidden" name="id" value="<?= $card[0]['id'] ?>">
                </form>  
            </div>
            <div class="card-footer">
                <button type="submit" form="formParticipate" class="btn btn-primary">Participer</button>
            </div>
        </div>
    </div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>