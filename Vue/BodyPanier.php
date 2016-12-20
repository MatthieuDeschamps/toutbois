<?php

function afficheBodyPanier() {
    ?>
    <?php if (isset($_SESSION['panier'])) { ?>
    <?php if(isset($_GET['del'])){
       $tableau=$_SESSION['panier']->suppressionLigneDeCommande($_GET['del'],$_SESSION['panier']->getLigneDeCommande());
       $_SESSION['panier']->setLigneDeCommande($tableau);
    }?>
        <section id = "bodyPanier">
            <div class="container panier">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h3> Votre Commande</h3>
                    </div>
                </div>
                <div class="row">
                    <form method="post" action="calculPrixPanier.php">
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
                                        <th> 
                                            <input type="number" name="<?= $product->getProduit()->getCodeProduit(); ?>" value="<?= $product->getQuantite(); ?>">
                                        </th>
                                        <th><?= number_format($product->calculerPrixTTC(), 2, ',', ' '); ?> €</th>
                                        <th>                                        
                                            <a href="../Controlleur/panier.php?del=<?= $product->getProduit()->getCodeProduit(); ?>" class="btn btn-danger glyphicon glyphicon-trash" aria-label="Panier" aria-hidden="true"></a>
                                        </th>
                                    </tr>
                                    </tbody>
                                <?php endforeach; ?>
                        </table>
                        <input type="submit" class="btn btn-info" value="Recalculer">
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
               <?php if($_SESSION){ ?>
                <a href="validationCommande.php" ><button class="btn btn-success center-block">Valider la commande</button></a>
            <?php } ?>
            </div>
        </section>

    <?php }else { ?>
        <div class="container">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row text-center">
                    <h3> PAS DE PRODUIT DANS LE PANIER </h3>
                    <img src="../img/logo/caddyVide.png" alt="Panier vide">
                </div>
            </div>
        </div>

        <?php
    }
}
?>

