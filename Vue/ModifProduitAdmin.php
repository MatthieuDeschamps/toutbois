<?php
function afficheModifProduitAdmin($donnees,$tva,$typeProduit) {
   //print_r($donnees);
?>
<form method="post" action="traitementModifierArticle.php?id=<?php echo $donnees['codeProduit']; ?>">
    <div class="container">
        <fieldset class="form-group">
        <legend>Code Produit : <?php echo $donnees['codeProduit']; ?></legend>
            
        <div class="form-group">
            <label for="libelleProduit">Libellé</label>
            <input type="text" class="form-control" id="libelleProduit" name="libelleProduit" value="<?php echo $donnees['libelleProduit']; ?>">
        </div>
            
        <div class="form-group">
            <label for="stockProduit" >Stock</label>
            <input class="form-control" type="number" id="stockProduit" name="stockProduit" value="<?php echo $donnees['stockProduit']; ?>">
        </div>
            
        <div class="form-group">
            <label for="prixProduit">Prix</label>
            <input type="text" class="form-control" id="prixProduit" name="prixProduit" value="<?php echo $donnees['prixUnitaireProduit']; ?>">
        </div>
        
        <div class="form-group">
            <label for="remiseProduit">Remise</label>
            <input type="text" class="form-control" id="remiseProduit" name="remiseProduit" value="<?php echo $donnees['remiseProduit']; ?>">
        </div>
        
        <div class="form-group">
            <label for="descriptionProduit">Description</label>
            <textarea class="form-control" id="descriptionProduit" name="descriptionProduit" rows="3" ><?php echo $donnees['description']; ?></textarea>
        </div>
            
        <div class="form-group">
            <label for="lienImageProduit">Lien Image</label>
            <input type="text" class="form-control" id="lienImageProduit" name="lienImageProduit" value="<?php echo $donnees['image']; ?>">
        </div>
        
        <div class="form-group">
            <label for="tvaProduit">TVA</label>
            <select class="form-control" id="tvaProduit" name="tvaProduit">
              <option value="<?php echo $donnees['id_TVA']; ?>"><?php echo $donnees['tauxTVA']; ?></option>
            <?php foreach ($tva as $donnee)
            { ?>
                <option value="<?php echo $donnee['id_TVA']; ?>"><?php echo $donnee['tauxTVA']; ?></option>
        <?php } ?>
            </select>
        </div>
            
        <div class="form-group">
            <label for="typeProduit">Type du Produit</label>
            <select class="form-control" id="typeProduit" name="typeProduit">
              <option value="<?php echo $donnees['Id_typeProduit']; ?>"><?php echo $donnees['libelleTypeProduit']; ?></option>
            <?php foreach ($typeProduit as $donnee)
            { ?>
                <option value="<?php echo $donnee['Id_typeProduit']; ?>"><?php echo $donnee['libelleTypeProduit']; ?></option>
        <?php } ?>
            </select>
        </div>
      </fieldset>
      <button type="submit" class="btn btn-primary">Modifier</button>
    </div>
</form>
<?php } ?>