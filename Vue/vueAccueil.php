<?php
// on met le titre dans une variable qui sera appelée dans le gabarit
$this->titre = "Bienvenue sur le BlogCulinaire";

?>
<section class="p-5 container">
    <h1>La recette à la une :</h1>
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-4 offset-lg-4">
            <div class="card" style="width: 18rem;">
                <img src="../images/<?= $recipe['rec_miniature']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">
                        <?= $recipe['rec_nom']; ?>
                    </h5>
                    <p class="card-text">
                        <?= $recipe['rec_resume']; ?>
                    </p>
                    <a href="index.php?action=recette&id=<?= $recipe['rec_id']; ?>" class="btn btn-success">Voir la recette</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="p-5 container">
    <h1>Les 3 dernières recettes :</h1>
    <div class="card-group">
        <?php
        foreach ($recipes as $dish) { ?>
            <div class="col-sm-12 col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="../images/<?= $dish['rec_miniature']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= $dish['rec_nom']; ?>
                            </h5>
                            <p class="card-text">
                                <?= $dish['rec_resume']; ?>
                            </p>
                            <a href="index.php?action=recette&id=<?= $dish['rec_id']; ?>" class="btn btn-warning">Voir la recette</a>                  
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<section class="p-5 container">
        <h1>Les 3 derniers commentaires :</h1>
        <div class="row">
            <div id="carouselExampleSlidesOnly col-sm-12 col-md-6 bg-carousel" class="carousel slide my-5"
                data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    foreach ($coms as $com) {
                        if ($com['com_id'] == 1) { ?>
                            <div class="carousel-item bg-carousel active py-3">
                            <?php } else { ?>
                                <div class="carousel-item bg-carousel py-3">
                                <?php } ?>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-8 text-center">
                                        <p class="fs-5">
                                            <?= $com['rec_nom'] ?>
                                        </p>
                                        <p>
                                            <img class="rounded-circle shadow-1-strong mb-4"
                                                src="../images/<?= $com['rec_miniature'] ?>" alt="avatar"
                                                style="width: 150px;" />
                                        </p>
                                        <p class="text-muted fs-2">
                                            <i class="bi bi-quote"></i>
                                            <?= $com['com_contenu'] ?>
                                        </p>
                                        <h2 class="mb-3 fs-3">
                                             <!-- raccourci pour < ?php echo  -->
                                            <?= $com['com_auteur'] ?>
                                        </h2>
                                    </div>
                                </div>
                                <ul class="list-unstyled d-flex justify-content-center text-warning mb-0">
                                    <li><i class="bi bi-star-fill"></i></li>
                                    <li><i class="bi bi-star-fill"></i></li>
                                    <li><i class="bi bi-star-fill"></i></li>
                                    <li><i class="bi bi-star-fill"></i></li>
                                    <li><i class="bi bi-star-fill"></i></li>
                                </ul>
                            </div>
                        <?php } ?>
                    </div><!-- /.carousel-item -->
                </div><!-- /.carousel-inner-->
            </div><!-- /.carousel -->
        </div><!-- /.row -->
</section>

<?php 

?> 


