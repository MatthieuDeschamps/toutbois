<?php

function afficheBodyCommande($listeCommande) {
    ?>
    <?php if (isset($listeCommande)) { ?>
    
        <section id = "bodyPanier">
            <div class="container panier">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h3> Vos Commandes</h3>
                    </div>
                </div>
                <div class="row">
                    <form method="post" action="panier.php">
                        <table class="table">
                            <thead>
                                <tr text-align="center">
                                    <th>Réference commande</th>
                                    <th>Date de la commande</th>
                                    <th>Date livraison commande</th>
                                    <th>Etat commande</th>
                                    <th>Prix commande HT</th>
                                </tr>
                            </thead>

                            <?php
                            foreach ($listeCommande as $product):
                                
                                ?>
                                <tbody>
                                    <tr text-align="center">
                                        <th> Commande numéro <?= $product['numero commande']; ?></th>
                                        <th><?= $product['dateCommande']; ?></th>
                                        <th><?= $product['dateLivraisonCommande']; ?></th>                                                                   
                                        <th><?= $product['libelle_EtatCommande']; ?></th>
                                        <th><?= $product['total']; ?>€</th>
                                    
                                    </tr>
                                    </tbody>
                                <?php endforeach; ?>
                        </table>
                    </form>
                </div>
            </div>
        </section>
        
        <section id = "commande">
            <div class="container">
                
                    <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                        <a href="../Controlleur/catalogue.php" class="btn btn-danger glyphicon glyphicon-menu-left"  aria-label="Panier" aria-hidden="true"> Retour</a>
                       
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

