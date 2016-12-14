<?php
function afficheBodyPanier() {
?>
    <section id = "bodyPanier">
        <div class="container panier">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h3> Commande en cours</h3>
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
                                    <th><input type="text" name="panier[quantity][<?= $product->getQuantite(); ?>]" value="<?= $product->getQuantite(); ?>"></th>
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

    <div class="container totalcommande">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h3>Total commande cours: </h3>
            </div>
        </div>
    
        <div class="row totalcommande">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <h4><?= number_format($_SESSION['panier']->totalCommandeTTC(), 2, ',', ' '); ?> € </h4>
                </div>
            
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <input type="submit" value="Recalculer">
                </div>
        </div>
    </div>
        
<?php } ?>

