<?php

function afficheBodyCatalogue($donnees) {
    ?>
    <section id = "bodyCatalogue">
        <div class="container catalogue">
            <div class="row">
                <!-- Nav Article-->

                <div class="col-md-3">
                    <h3 class="lead">Catégorie</h3>
                    <div class="list-group">
                        <a href="../Controlleur/catalogue.php?Id_typeProduit=1" class="list-group-item">Assise</a>
                        <a href="../Controlleur/catalogue.php?Id_typeProduit=3" class="list-group-item">Table</a>
                        <a href="../Controlleur/catalogue.php?Id_typeProduit=2" class="list-group-item">Rangement</a>
                    </div>
                </div>
                

                <div class="col-md-9 " >
                    <?php
                    foreach ($donnees as $donnee) {
                        ?>
                        <!-- fiche produits-->
                        <div class="row">

                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <h3 class="lead"><?php echo $donnee['libelleProduit']; ?></a></h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12 thumbnail">
                                <div class="col-sm-3 col-lg-3 col-md-3">
                                    <img src="<?php echo '../' . $donnee['Image'] ?>" class="img-responsive" alt="<?php echo '../' . $donnee['Image'] ?>">
                                </div>
                                <div class="col-sm-9 col-lg-9 col-md-9">
                                    <div class="row">
                                        <div class="col-sm-9 col-lg-9 col-md-9">
                                            <p class="paraCatalogue"><?php echo $donnee['description'] ?></p>
                                        </div>
                                        <div class="col-sm-3 col-lg-3 col-md-3">
                                            <div class="row">
                                                <h2 class="paraCatalogue"><?php echo number_format($donnee['prixUnitaireProduit'] ,2, ',', ' ') ?> €</h2>
                                            </div>
                                            <div class="row">
                                                <p class="paraCatalogue">hors tva</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <form method="post" action="../Controlleur/panierTraitement.php?id=<?php echo $donnee['codeProduit']; ?>">
                                            <div class="col-sm-4 col-lg-4 col-md-4">
                                                <input id="inputQuantite"type="number" name="nbrProduit" placeholder="Quantité" class="form-control" required autofocus>
                                            </div>
                                            <div class="col-sm-push-3 col-lg-push-3 col-md-push-3">
                                                <button type="submit" class="btn btn-success" aria-label="Panier"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-md-12">
            <div class="pagination text-center"></div> 
        </div>
    </div>
    <?php
}
?>
