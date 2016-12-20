<?php

require('../Model/Produit.php');
require('../Model/LigneCommande.php');
require('../Model/Panier.php');
session_start();


require('../DAO/toutboisDAO.php');



if (isset($_SESSION['id'])) {



    $produit = ToutboisDAO::get_produitById($_GET['id']);
    $produitLigneCommande = new Produit;
    $produitLigneCommande->setCodeProduit($_GET['id']);
    $produitLigneCommande->setLibelleProduit(htmlspecialchars($produit['libelleProduit']));
    $produitLigneCommande->setStock((int) $produit['stockProduit']);
    $produitLigneCommande->setPrixProduit((float) $produit['prixUnitaireProduit']);
    $produitLigneCommande->setRemiseProduit((float) $produit['remiseProduit']);
    $produitLigneCommande->setDescriptionProduit(htmlspecialchars($produit['description']));
    $produitLigneCommande->setLienImageProduit($produit['image']);
    $produitLigneCommande->setTVAProduit($produit['tauxTVA']);
    $produitLigneCommande->setTypeProduit($produit['libelleTypeProduit']);


    $ligneCommande = new LigneCommande;
    $ligneCommande->setProduit($produitLigneCommande);
    $ligneCommande->setQuantite(abs((int)$_POST['nbrProduit']));


    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = new Panier();
    }

    foreach ($_SESSION['panier']->getLigneDeCommande() as $value) {        
        // pour ajouter la quantité à un produit existant
        if ($produitLigneCommande->getCodeProduit() === $value->getProduit()->getCodeProduit()) {
            
            $value->setQuantite($value->getQuantite()+$ligneCommande->getQuantite());
            $produitDejaLigneCommande=true;
        
        }
    }

    // ajout du produit dans le panier si pas existant
    if(!isset($produitDejaLigneCommande)){
    $_SESSION['panier']->ajoutLigneDeCommande($ligneCommande);
    }

    header("location:../Controlleur/catalogue.php");
} else {
    header("location:../Controlleur/identification.php");
}
?>