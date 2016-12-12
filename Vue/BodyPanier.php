<?php
function afficheBodyPanier() {
  
?>
<section id = "bodyPanier">
    <div class="container panier">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h3 class="lead"> Commande en cours</h3>
            </div>
        </div>
        <div class="row">
            <form method="post" action="panier.php">
		<div class="table">
			<div class="wrap">
				<div class="rowtitle">
					<span class="name">Libellé Produit</span>
					<span class="price">Prix</span>
					<span class="quantity">Quantité</span>
					<span class="subtotal">Prix avec TVA</span>
					<span class="action">Actions</span>
				</div>
				<?php
				foreach($_SESSION['panier']->getLigneDeCommande() as $product):
				?>
				<div class="row">
					<span class="name"><?= $product->getProduit()->getLibelleProduit(); ?></span>
					<span class="price"><?= number_format($product->getProduit()->getPrixProduit(),2,',',' '); ?> €</span>
					<span class="quantity"><input type="text" name="panier[quantity][<?= $product->getQuantite(); ?>]" value="<?= $product->getQuantite(); ?>"></span>
					<span class="subtotal"><?= number_format($product->calculerPrixTTC(),2,',',' '); ?> €</span>
					<span class="action">
						<a href="panier.php?delPanier=<?= $product->getProduit()->getCodeProduit(); ?>" class="del"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
					</span>
				</div>
				<?php endforeach; ?>
				<div class="rowtotal">
					Grand Total : <span class="total"><?= number_format($_SESSION['panier']->totalCommandeTTC(),2,',',' '); ?> € </span>
				</div>
				<input type="submit" value="Recalculer">
			</div>
		</div>
	</form>
          
        </div>
    </div>
</section>
<?php } ?>

