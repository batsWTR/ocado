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
     if(isset($message) && $message != ''){
        ?>
        <div class="alert fade show alert-dismissible alert-danger w-75 mx-auto my-4" role="alert">
            <?= $message ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php } ?>
    <?php foreach($resultats as $key => $value){ ?>
        <div class="card my-3">
            <div class="card-header">
                <div class="container">
                    <div class="row">
                        <h4 class="col-6"><?= ucfirst($key) ?></h4>
                        <?php if($_SESSION['name'] == $key && !$_SESSION['isAdmin']){ ?>
                        <a class="col-2 ms-auto" href="index.php?url=deleteCard"><i class="far fa-trash-alt"></i></a>
                        <?php } ?>  
                    </div>
                </div>  
            </div>
            <div class="card-body">
                <h5>Je souhaite:</h5>
                <?php if(sizeof($value["gift"]) != 0){
                    foreach($value["gift"] as $cle=>$gift){
                        $nb_participant = 0;
                        foreach($value["participant"] as $participant){
                            if($participant["giftId"] == $cle){
                                $nb_participant ++;
                            }
                        } ?>
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-5"><?= $gift["description"] ?></div>
                        <div class="col-3"><?= $gift['price'] ?>  	&euro;</div>
                        <?php if($_SESSION["name"] == $key){ ?>
                            <a href='index.php?url=removePresent&id=<?=$cle?>' class="col-3 ms-auto"><i class="far fa-trash-alt"></i></a>
                        <?php }else{ ?>
                            <a href='index.php?url=participer&id=<?= $cle ?> ' class="col-4 ms-auto" href="">Je participe</a>
                        <?php } ?>
                    </div>
                    <?php if($gift["link"] != NULL){ ?>
                    <div class="row">
                        <a href="<?= $gift["link"] ?>" class="col mb-1" target="_blank">Lien</a>
                    </div>
                    <?php } ?>
                    <div class="row mb-3">
                        <div class="accordion accordion-flush" id="accordionParticipant<?= $cle ?>">
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseParticipant<?= $cle ?>"><?= $nb_participant ?> participants</button>
                                </div>
                                <div class="accordion-collapse collapse" id="collapseParticipant<?= $cle ?>" data-bs-parent="#accordionParticipant<?= $cle ?>">
                                    <div class="accordion-body">
                                        <div class="container">
                                            <div class="row">
                                                <?php foreach($value["participant"] as $participant){
                                                    if($participant["giftId"] == $cle){ ?>
                                                    <div class="col-6">
                                                        <p><?= $participant["owner_id"] ?> <span><?= $participant["amount"] ?>  	&euro;</span></p>  
                                                    </div>

                                                  <?php  }
                                                } ?>
                                                
                                            </div
                                        ></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php   }
                } ?>
            </div>
            <div class="card-footer">
                <div class="container">
                    <div class="row">
                        <?php if($key == $_SESSION['name']){ ?>
                        <button type='button' class='btn btn-primary col-6' data-bs-toggle='modal' data-bs-target='#modalAjout'>Ajouter un Cado</button>
                        <?php } ?>
                        <?php if($_SESSION['isAdmin'] && ($key == $_SESSION['name'])){ ?>
                        <a href="index.php?url=admin" class="btn btn-primary col-4 ms-auto">Admin</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    

</div>
<!---   Modal add present  --->
<div class='modal fade' id="modalAjout">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter un cadeau<h5>
                <button type='button' class='btn-clos' data-bs-dismiss='modal'></button>
            </div>
            <p>Champs obligatoires *</p>
            <div class="modal-body">
                <form id='formAdd' action="index.php?url=addPresent" method="POST">
                    <div>
                        <label for="description">Description*</label>
                        <input type='text' name='description' size='21' required>
                    </div>
                    <div>
                        <label for="price">Prix</label>
                        <input type='number' name='price' size='5'>
                    </div>
                    <div>
                        <label for="link">Lien</label>
                        <input type='text' name='link' size='21'>
                        <input type="text" hidden value= <?=$resultats[$_SESSION["name"]]['cardId']; ?> name='cardId'>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            <button type='submit' class="btn btn-success" form='formAdd'>Ajouter</button>
            <button type='button' class="btn" data-bs-dismiss='modal'>Annuler</button>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>