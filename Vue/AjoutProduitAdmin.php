<?php
function afficheAjoutProduitAdmin($tva,$typeProduit) {
?>

<form method="post" action="traitementAjouterArticle.php">
    <div class="container">
        <fieldset class="form-group">
        <legend>Nouveau Produit</legend>
            
        <div class="form-group">
            <label for="libelleProduit">Libellé</label>
            <input type="text" class="form-control" id="libelleProduit" name="libelleProduit" >
        </div>
            
        <div class="form-group">
            <label for="stockProduit" >Stock</label>
            <input class="form-control" type="number" id="stockProduit" name="stockProduit" >
        </div>
            
        <div class="form-group">
            <label for="prixProduit">Prix</label>
            <input type="text" class="form-control" id="prixProduit" name="prixProduit" >
        </div>
        
        <div class="form-group">
            <label for="remiseProduit">Remise</label>
            <input type="text" class="form-control" id="remiseProduit" name="remiseProduit" >
        </div>
        
        <div class="form-group">
            <label for="descriptionProduit">Description</label>
            <textarea class="form-control" id="descriptionProduit" name="descriptionProduit" rows="3" ></textarea>
        </div>
            
        <div class="form-group">
            <label for="lienImageProduit">Lien Image</label>
            <input type="text" class="form-control" id="lienImageProduit" name="lienImageProduit" >
        </div>
        
        <div class="form-group">
            <label for="tvaProduit">TVA</label>
            <select class="form-control" id="tvaProduit" name="tvaProduit">
            <?php foreach ($tva as $donnee)
            { ?>
                <option value="<?php echo $donnee['id_TVA']; ?>"><?php echo $donnee['tauxTVA']; ?></option>
        <?php } ?>
            </select>
        </div>
            
        <div class="form-group">
            <label for="typeProduit">Type du Produit</label>
            <select class="form-control" id="typeProduit" name="typeProduit">
            <?php foreach ($typeProduit as $donnee)
            { ?>
                <option value="<?php echo $donnee['Id_typeProduit']; ?>"><?php echo $donnee['libelleTypeProduit']; ?></option>
        <?php } ?>
            </select>
        </div>
      </fieldset>
      <button type="submit" class="btn btn-primary">Ajouter</button>
    </div>
</form>
<?php } ?>