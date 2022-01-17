

<?php
$style = '<link rel="stylesheet" type="text/css" href="./public/css/participate.css">';

 ob_start(); ?>

    <div id="content">
    <?php
    if(isset($message)){
        ?>
        <div class="alert fade show alert-dismissible alert-nok w-75 mx-auto my-4" role="alert">
            <?= $message ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php } ?>
        <div class="card">
            <h4 class="card-header"><?= ucfirst($gift[0]['name']) ?></h4>
            <div class="card-body">
                <form id="formParticipate" action="index.php?url=<?php if(!empty($participation)){
                    echo "participateUpdate";
                }else{
                    echo "participateAction";
                }
                    ?>" method="POST">
                    <p><?= $gift[0]['description']?> <span><?= $gift[0]['price'] ?>&euro;</span></p>
                    <label for="amount">Montant</label>
                    <input type="number" name="amount" size="6" value="<?php if(!empty($participation)){
                        echo $participation[0]["price"];
                    }else{
                            echo "";
                        }
                         ?>" min="1" max="<?= $gift[0]['price'] ?>">
                    <input type="hidden" name="id" value="<?= $gift[0]['id'] ?>">
                    <input type="hidden" name="owner" value="<?= $card[0]["id"] ?>">
                </form>  
            </div>
            <div class="card-footer">
                <button type="submit" form="formParticipate" class="btn btn-primary">Participer</button>
            </div>
        </div>
    </div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>