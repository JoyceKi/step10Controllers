<?php 
$this->titre = "Votre recette ";

?>

<div class="card col-9 ms-5">
    <img src="../images/<?= $single['rec_image']; ?>" class="card-img-top width-80" alt="photo plat">
    <div class="card-img-overlay">
    <h5 class="card-title"><?= $single['rec_nom']; ?></h5>    
    </div>
    <div class="card mb-3">
        <ul class="list-group d-flex flex-row justify-content-evenly list-group-flush ">
            <li class="list-group-item">Temps :<?= $single['rec_temps'];?></li>
            <li class="list-group-item">Niveau de difficulté :<?= $single['rec_difficulte']; ?></li>
            <li class="list-group-item">Budget :<?= $single['rec_budget']; ?></li>
        </ul>
    </div>
    <div class="card mb-3 ">
        <h6 class="card-subtitle mb-2 text-body-secondary">Ingrédients</h6>
        <p class="card-text"><?= $single['rec_ingredients']; ?></p>
    </div>
    <div class="card mb-3 ">
        <h6 class="card-subtitle mb-2 text-body-secondary">Préparation</h6>
        <p class="card-text"><?= $single['rec_preparation']; ?></p>   
    </div>
    <div class="card mb-3 ">
        <h6 class="card-subtitle mb-2 text-body-secondary">Commentaires</h6>
        <?php
        if (!empty($comments)) {
            foreach ($comments as $com) { 
            ?>
            <p class="card-text"><?= $com['com_contenu']; ?></p>
            <p class="card-text text-center"><?= $com['com_auteur']; ?></p>
            <?php }
        } else {
        echo "Il n'y a pas encore de commentaires pour cette recette.";
        }?>
    </div>
    <div class="card mb-3 ">
        <form action="index.php?action=commenter" method="post" class= "mb-2">
            <p class= "fs-5">
                Laissez un commentaire ...
            </p>
            <p class="col" >
                <input id="auteur" class="form-control" name="auteur" type="text" placeholder="Votre pseudo" required >
            </p>
            <p class="col" >
                <textarea name="contenu" id="txtCommentaire" cols="100" rows="4" placeholder="Votre commentaire" required >                    
                </textarea>
                <input type="hidden" name="idRecette" value="<?= $single['rec_id'] ?>" >
            </p>
            <p class="col" >
                <input type="submit" class="btn btn-primary" value="Commenter" >
            </p>
        </form>
    </div>
    
</div>
