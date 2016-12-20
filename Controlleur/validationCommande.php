<?php  
        require('../Model/Produit.php');
        require('../Model/LigneCommande.php');
        require('../Model/Panier.php');
        session_start();
        require('../DAO/toutboisDAO.php');
        
        if(isset($_SESSION['id'])) {

            ToutboisDAO::insertCommande($_SESSION['panier'], $_SESSION['id']);
            
            unset($_SESSION['panier']);
            
            header("location:../Controlleur/panier.php");
      
        }
        else
        {
            header("location:../Controlleur/index.php");
        }
?>

