<?php

require('../Model/Produit.php');
require('../Model/LigneCommande.php');
require('../Model/Panier.php');
session_start();
if (isset($_SESSION['id'])) {

require('../DAO/toutboisDAO.php');
//require('../Vue/pagination.php');
require('../Vue/Head.php');
require('../Vue/Menu.php');
require('../Vue/FooterPagination.php');
require('../Vue/BodyCatalogue.php');


if (isset($_GET['Id_typeProduit'])&& $_GET['Id_typeProduit'] <= 3 && $_GET['Id_typeProduit'] >0 ) {
$donnees = ToutboisDAO::get_produitByType($_GET['Id_typeProduit']);
}else{
$donnees = ToutboisDAO::get_produit();
}


if (isset($_GET['Id_typeProduit'])) {

$pages = ToutboisDAO::getNombrePageParTypeProduit($_GET['Id_typeProduit']);

}else{
$pages = ToutboisDAO::getNombrePage();
}





afficheEntete(1);
afficheMenu(1);
afficheBodyCatalogue($donnees);
afficheFooter($pages);
} else {
header("location:../Controlleur/index.php");
}
?>