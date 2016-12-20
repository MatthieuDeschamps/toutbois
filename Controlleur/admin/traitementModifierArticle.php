<?php  
        session_start();
        if(isset($_SESSION['admin']) && $_SESSION['admin'] === 1) {

            require('../../DAO/toutboisDAO.php');
            require('../../Model/Produit.php');

            $produit = new Produit;
            $produit->setCodeProduit((int) $_GET['id']);
            $produit->setLibelleProduit(htmlspecialchars($_POST['libelleProduit']));
            $produit->setStock(abs((int) $_POST['stockProduit']));
            $produit->setPrixProduit(abs((float) $_POST['prixProduit']));
            $produit->setRemiseProduit(abs((float) $_POST['remiseProduit']));
            $produit->setDescriptionProduit(htmlspecialchars($_POST['descriptionProduit']));
            $produit->setLienImageProduit(htmlspecialchars($_POST['lienImageProduit']));
            $produit->setTVAProduit((int) $_POST['tvaProduit']);
            $produit->setTypeProduit((int)$_POST['typeProduit']);
            
            ToutboisDAO::updateProduit($produit);
            
            
            header("location:backoffice.php");
            
            //$codeProduit= (int) $_GET['id'];
            //$libelleProduit = htmlspecialchars($_POST['libelleProduit']);
            //$stock = (int) $_POST['stockProduit'];
            //$prixProduit = (float) $_POST['prixProduit'];
            //$remiseProduit = (float) $_POST['remiseProduit'];
            //$descriptionProduit = htmlspecialchars($_POST['descriptionProduit']);
            //$lienImageProduit = htmlspecialchars($_POST['lienImageProduit']);
            //$tvaProduit = (int) $_POST['tvaProduit'];
            //$typeProduit = (int)$_POST['typeProduit'];
            
            
        }
        else
        {
            header("location:../../Controlleur/index.php");
        }
?>