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
    foreach($results as $key=>$val){?>
    <div class='card my-3'>
        <div class="card-header">
            <h4><?= $key ?></h4>
            <? if($_SESSION['name'] == $key && !$_SESSION['isAdmin']){ ?>
                <a href="#">Supprimer</a>
           <? } ?>  
        </div>
    
        <div class="card-body">
            <h5>Je souhaite:</h5>
            <ul>
                <?php
                foreach($val['presents'] as $present){
                    if($present['description'] != ''){ ?>
                        <li><p><?= $present['description']?></p><div><span><?= $present['price']?>&#x20AC;</span>
                        <?php
                        if($key == $_SESSION['name']){ ?>
                            <a href='index.php?url=removePresent&id=<?=$present['giftId']?>'><i class="far fa-trash-alt"></i></a></div></li>

                       <?php }else{ ?>
                            </div></li>
                       <?php }

                    }
                }
                ?>
            </ul>
            <?php if($key == $_SESSION['name']){ ?>
                <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modalAjout'>Ajouter</button>
            <?php } ?>
            <?php if($_SESSION['isAdmin'] && ($key == $_SESSION['name'])){ ?>
            <a href="index.php?url=admin" class="btn btn-primary">Admin</a>
            <?php } ?>
        </div>
        
    </div>
    <?php } ?>
</div>
<div class='modal fade' id="modalAjout">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter un cadeau<h5>
                <button type='button' class='btn-clos' data-bs-dismiss='modal'></button>
            </div>
            <div class="modal-body">
                <form id='formAdd' action="index.php?url=addPresent" method="POST">
                    <div>
                        <label for="description">Description</label>
                        <input type='text' name='description' size='35' required>
                    </div>
                    <div>
                        <label for="price">Prix</label>
                        <input type='number' name='price' size='5'>
                    </div>
                    <div>
                        <label for="link">Lien</label>
                        <input type='text' name='link' size='35'>
                        <input type="text" hidden value= <?=$results[$_SESSION["name"]]['cardId']; ?> name='cardId'>
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