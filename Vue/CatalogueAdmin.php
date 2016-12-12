<?php
function afficheCatalogueAdmin($donnees) {
?>
<section id = "bodyCatalogue">
<div class="container catalogue">
  <div class="row">
    

    <div class="col-md-3">
      <h3 class="lead">Catégorie</h3>
      <div class="list-group">
        <a href="#" class="list-group-item">Assise</a>
        <a href="#" class="list-group-item">Table</a>
        <a href="#" class="list-group-item">Rangement</a>
      </div>
    </div>
    <!-- Grille article-->
    <!--Chargement produit avec DAO-->

    <div class="col-md-9">
        <a href="ajouterArticle.php"><button type="button" class="btn btn-success">Ajouter</button></a>
        
    <table class="table">
    <thead>
      <tr>
        <th>Code Produit</th>
        <th>Libellé Produit</th>
        <th>Stock Produit</th>
        <th>Prix Unitaire</th>
        <th>Remise</th>
        <th>Description</th>
        <th>Image</th>
        <th>TVA</th>
        <th>Type Produit</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($donnees as $donnee)
      {
        ?>
    
      <tr>
        <td><?php echo $donnee['codeProduit']; ?></td>
        <td><?php echo $donnee['libelleProduit']; ?></td>
        <td><?php echo $donnee['stockProduit']; ?></td>
        <td><?php echo $donnee['prixUnitaireProduit']; ?></td>
        <td><?php echo $donnee['remiseProduit']; ?></td>
        <td><?php echo $donnee['description']; ?></td>
        <td><img src="<?php echo '../../'.$donnee['image'] ?>" class="img-responsive" alt="<?php echo '../../'.$donnee['image'] ?>"></td>
        <td><?php echo $donnee['tauxTVA']; ?></td>
        <td><?php echo $donnee['libelleTypeProduit']; ?></td>
        <td><a href="modifierArticle.php?id=<?php echo $donnee['codeProduit']; ?>"><button type="button" class="btn btn-primary">Modifier</button></a><a href="supprimerArticle.php?id=<?php echo $donnee['codeProduit']; ?>"><button type="button" class="btn btn-danger">Supprimer</button></a></td>
      </tr>
        <?php
      }
      ?>
    </tbody>
     </table>   
    </div>
  </div>
</div>
</section>
 <?php
      }
?>
