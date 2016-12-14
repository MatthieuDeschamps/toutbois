<?php

function afficheBodyPanier() {
    ?>
    <?php if (isset($_SESSION['panier'])) { ?>
        <section id = "bodyPanier">
            <div class="container panier">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h3> Votre Commande</h3>
                    </div>
                </div>
                <div class="row">
                    <form method="post" action="panier.php">
                        <table class="table">
                            <thead>
                                <tr text-align="center">
                                    <th>Libellé Produit</th>
                                    <th>Image Produit</th>
                                    <th>Prix</th>
                                    <th>Quantité</th>
                                    <th>Prix avec TVA</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>

                            <?php
                            foreach ($_SESSION['panier']->getLigneDeCommande() as $product):
                                ?>
                                <tbody>
                                    <tr text-align="center">
                                        <th><?= $product->getProduit()->getLibelleProduit(); ?></th>
                                        <th><img src="<?= '../' . $product->getProduit()->getLienImageProduit(); ?>" class="img-responsive img-panier"></th>
                                        <th><?= number_format($product->getProduit()->getPrixProduit(), 2, ',', ' '); ?> €</th>                                                                   
                                        <th><input type="number" name="panier[quantity][<?= $product->getQuantite(); ?>]" value="<?= $product->getQuantite(); ?>"></th>
                                        <th><?= number_format($product->calculerPrixTTC(), 2, ',', ' '); ?> €</th>
                                        <th>
                                            <a href="panier.php?delPanier=<?= $product->getProduit()->getCodeProduit(); ?>" class="del"><th class="glyphicon glyphicon-trash" aria-hidden="true"></th></a>
                                        </th>
                                    </tr>
                                </tbody>
                            <?php endforeach; ?>
                        </table>
                    </form>
                </div>
            </div>
        </section>

        <section id = "totalPanier">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <h3>Total commande HT: </h3>
                        <h4>Total TVA: </h4>
                        <h4>Total commande TTC: </h4>

                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 text-right">
                        <h3><?= number_format($_SESSION['panier']->totalCommandeHT(), 2, ',', ' '); ?> €  </h3>
                        <h4><?= number_format($_SESSION['panier']->totalTVA(), 2, ',', ' '); ?> €  </h4>
                        <h4><?= number_format($_SESSION['panier']->totalCommandeTTC(), 2, ',', ' '); ?> €  </h4>
                    </div>


                </div>
                
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <input type="submit" class="btn btn-info" value="Recalculer">
                        <input type="submit" class="btn btn-success" value="Valider">
                    </div>
                </div>
            </div>
        </section>

    <?php }else { ?>
        <div class="container">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row text-center">
                    <h3> PAS DE COMMANDE EN COURS</h3>
                    <img src="../img/logo/caddyVide.png" alt="Panier vide">
                </div>
            </div>
        </div>

        <?php
    }
}
?>

