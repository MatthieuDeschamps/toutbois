<?php  
        session_start();
        if(isset($_SESSION['admin']) && $_SESSION['admin'] === 1) {

            require('../../DAO/toutboisDAO.php');
            require('../../Model/Produit.php');

            $produit = new Produit;
            $produit->setCodeProduit((int) $_GET['id']);
            $produit->setLibelleProduit(htmlspecialchars($_POST['libelleProduit']));
            $produit->setStock((int) $_POST['stockProduit']);
            $produit->setPrixProduit((float) $_POST['prixProduit']);
            $produit->setRemiseProduit((float) $_POST['remiseProduit']);
            $produit->setDescriptionProduit(htmlspecialchars($_POST['descriptionProduit']));
            $produit->setLienImageProduit(htmlspecialchars($_POST['lienImageProduit']));
            $produit->setTVAProduit((int) $_POST['tvaProduit']);
            $produit->setTypeProduit((int)$_POST['typeProduit']);
            
            ToutboisDAO::deleteProduit($produit);
            
            
            header("location:backoffice.php");
            
            
            
        }
        else
        {
            header("location:../../Controlleur/index.php");
        }
?>