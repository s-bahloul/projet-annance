
<!--faire la partie html pour afficher mes article-->
<div class="container">

    <h2 class=" text-center text-info m-5 bg-primary ">Des millions de petites annonces et autant d’occasions de se faire plaisir</h2>

    <div class="row">

        <?php

        //faire le foreach pour affincher ma table
        foreach ($articles as $article) {
            ?>

            <div class="col-md-4 bg-info p-2">

                <div class="card">

                    <div class="p-3 border bg-light">

                        <h5 class=" text-center m-3 "><?= $article['nomArticle'] ?></h5>
                        <img src="<?= $article['photoArticle'] ?>" class="card-img-top img-fluid" alt="<?= $article['nomArticle'] ?>" title="<?= $article['nomArticle'] ?>">

                    </div>
                    <div class="card-body m-2">
                        <p class="card-text"><?= $article['descriptionArticle'] ?></p>
                        <p class="card-text text-info fw-bold">PRIX : <?= $article['prixArticle'] ?> €</p>


                        <div class="container  text-center  m-2">
                            <a  href="detailArticle?idArticle=<?= $article['idArticle'] ?>" class="btn btn-info  ">Plus d'info</a>
                        </div>
                    </div>

                </div>
            </div>

            <?php
        }
        ?>
    </div>
</div>
